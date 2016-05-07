<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Item_model extends CI_Model{
	private $itemid;
	private $itemname;
	private $itempicpath;
	private $equipspritepath;
	private $itemcollection;
	private $positionid;

	public function __construct(){
		parent::__construct();
	}
	public function set_itemid($itemid){
		$this->itemid = $itemid;
	}
	public function set_itemname($itemname){
		$this->itemname = $itemname;
	}
	public function set_itempicpath($itempicpath){
		$this->itempicpath = $itempicpath;
	}
	public function set_equipspritepath($equipspritepath){
		$this->equipspritepath = $equipspritepath;
	}
	public function set_itemcollection($itemcollection){
		$this->itemcollection = $itemcollection;
	}
	public function set_positionid($positionid){
		$this->positionid = $positionid;
	}
	public function get_itemid(){
		return $this->itemid;
	}
	public function get_itemname(){
		return $this->itemname;
	}
	public function get_itempicpath(){
		return $this->itempicpath;
	}
	public function get_equipspritepath(){
		return $this->equipspritepath;
	}
	public function get_itemcollection(){
		return $this->itemcollection;
	}
	public function get_positionid(){
		return $this->positionid;
	}
	public function getallitem(){
		$items = null;
		$this->db->select('itemname, itemcollection, positionname');
		$this->db->from('Item');
		$this->db->join('Position','position.positionid = item.positionid');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$items = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$itemname = $row['itemname'];
				$itemcollection = $row['itemcollection'];
				$positionname = $row['positionname'];
				$items[$i++] = 
					array(
						'itemno'=>$i,
						'itemname'=>$itemname,
						'itemcollection'=>$itemcollection,
						'positionname'=>$positionname
					);
			}
		}
		return $items;
	}
	public function searchitem($namepart){
		$items = null;
		$this->db->select('itemid, itemname, itemcollection, positionname');
		$this->db->from('Item');
		$this->db->join('Position','position.positionid = item.positionid');
		$this->db->like('itemname',$namepart);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$items = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$itemid = $row['itemid'];
				$itemname = $row['itemname'];
				$itemcollection = $row['itemcollection'];
				$positionname = $row['positionname'];
				$items[$i++] = 
					array(
						'itemno'=>$i,
						'itemid'=>$itemid,
						'itemname'=>$itemname,
						'itemcollection'=>$itemcollection,
						'positionname'=>$positionname
					);
			}
		}
		return $items;
	}
	public function getEquippableItem($keeperid){
		$items = null;
		$this->db->select('itemid');
		$this->db->from('management_item');
		$this->db->where('keeperid',$keeperid);
		$subquery = $this->db->get_compiled_select();
		$this->db->select('itemid,itemname');
		$this->db->from('Item');
		$this->db->where('positionid <> 10');
		$this->db->where('itemid IN ('.$subquery.')', null, false);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$items = array();
			$items[0] = null;
			$i = 1;
			foreach($query->result_array() as $row){
				$itemid = $row['itemid'];
				$itemname = $row['itemname'];
				$items[$itemid] = $itemname;
			}
		}
		return $items;
	}
	public function additem($itemname, $itempicpath, $equipspritepath, $itemcollection, $positionid){
		$item_obj = array(
			'itemname' => $itemname,
			'itempicpath' => $itempicpath,
			'equipspritepath' => $equipspritepath,
			'itemcollection' => $itemcollection,
			'positionid' => $positionid
			);
		$this->db->trans_start();
		$this->db->insert('Item',$item_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$session_data = $this->session->userdata('logged_in');
			$keeperid = $session_data['keeperid'];
			if($this->addmanagement($keeperid, $this->getitemid()) === TRUE){
				$this->db->trans_commit();
				return true;
			}else{
				$this->db->trans_rollback();
    			return false;
			}
		}
	}
	public function getposition(){
		$position = null;
		$this->db->select('*');
		$this->db->from('Position');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			foreach($query->result_array() as $row){
				$position[$row['positionid']] = $row['positionname'];
			}
		}else{
			echo "No data in query at 'getposition'";
		}
		return $position;
	}
	public function addmanagement($keeperid, $itemid){
		$management_obj = array(
			'keeperid' => $keeperid,
			'itemid' => $itemid
			);
		$this->db->trans_start();
		$this->db->insert('management_item',$management_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getitemid(){
		$itemid = null;
		$this->db->select_max('itemid', 'currentid');
		$this->db->from('Item');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$itemid = $row['currentid'];
		}else{
			echo "No data in query at 'getitemid'";
		}
		return $itemid;
	}
	public function getItemFromKeeperId($keeperid){
		$items = null;
		$this->db->select('itemid');
		$this->db->from('management_item');
		$this->db->where('keeperid',$keeperid);
		$subquery = $this->db->get_compiled_select();
		$this->db->select('*');
		$this->db->from('Item');
		$this->db->join('Position','Position.positionid = Item.positionid');
		$this->db->where('itemid IN ('.$subquery.')', null, false);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$items = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$itemid = $row['itemid'];
				$itemname = $row['itemname'];
				$itempicpath = $row['itempicpath'];
				$equipspritepath = $row['equipspritepath'];
				$itemcollection = $row['itemcollection'];
				$positionname = $row['positionname'];
				$items[$i++] = 
					array(
						'itemid'=>$itemid,
						'itemname'=>$itemname,
						'itempicpath'=>$itempicpath,
						'equipspritepath'=>$equipspritepath,
						'itemcollection'=>$itemcollection,
						'positionname'=>$positionname
					);
			}
		}
		return $items;
	}

	public function getItemFromItemId($itemid){
		$items = null;
		$this->db->select('*');
		$this->db->from('Item');
		$this->db->where('itemid',$itemid);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$items = array();
			foreach($query->result_array() as $row){
				$itemid = $row['itemid'];
				$itemname = $row['itemname'];
				$itempicpath = $row['itempicpath'];
				$equipspritepath = $row['equipspritepath'];
				$itemcollection = $row['itemcollection'];
				$positionid = $row['positionid'];
				$items = 
					array(
						'itemid'=>$itemid,
						'itemname'=>$itemname,
						'itempicpath'=>$itempicpath,
						'equipspritepath'=>$equipspritepath,
						'itemcollection'=>$itemcollection,
						'positionid'=>$positionid
					);
			}
		}
		return $items;
	}

	public function updateItem($itemid, $itemname, $itempicpath, $equipspritepath, $itemcollection, $positionid){
		$item_obj = array(
			'itemname' => $itemname,
			'itempicpath' => $itempicpath,
			'equipspritepath' => $equipspritepath,
			'itemcollection' => $itemcollection,
			'positionid' => $positionid
		);
		$this->db->trans_start();
		$this->db->where('itemid', $itemid);
		$this->db->update('Item', $item_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
}