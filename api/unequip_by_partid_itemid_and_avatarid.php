<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$part = null;
switch ($_POST['part']) {
	case '1':
		$part = 'headid';
		break;
	
	case '2':
		$part = 'backgroundid';
		break;

	case '3':
		$part = 'neckid';
		break;

	case '4':
		$part = 'bodyid';
		break;

	case '5':
		$part = 'handleftid';
		break;

	case '6':
		$part = 'handrightid';
		break;

	case '7':
		$part = 'armid';
		break;

	case '8':
		$part = 'legid';
		break;

	case '9':
		$part = 'footid';
		break;

	case '10':
		$part = 'specialid';
		break;

	default:
		$part = "xxx";
		break;
}
if($_POST["key"]=="asdlaekqwekasdlkxzc"){
	$sql="UPDATE Avatar SET ".$part." = null WHERE avatarid = ".$_POST['avatarid'];
	$SQL1Status = mysql_query($sql);
	if($SQL1Status){
	   	$sql2="UPDATE Inventory SET isequipped = 0 WHERE itemid = ".$_POST['itemid']." AND adventurerid = ".$_POST['avatarid'];
	    if(mysql_query($sql2)){
	   		echo "[{\"status\":\"1\"}]";
		}else{
			echo "[{\"status\":\"2\",\"error\":\"".mysql_error()."\"}]";  
		}
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysql_error()."\"}]";  
	}
}
mysql_close();
?>