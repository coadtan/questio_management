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
		$this->db->from('item');
		$this->db->join('position','position.positionid = item.positionid');
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
		$this->db->select('itemname, itemcollection, positionname');
		$this->db->from('item');
		$this->db->join('position','position.positionid = item.positionid');
		$this->db->like('itemname',$namepart);
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
}