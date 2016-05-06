<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$adventurer_id = isset($_REQUEST['adventurerid']) ? $_REQUEST['adventurerid'] : '';
$place_id = isset($_REQUEST['placeid']) ? $_REQUEST['placeid'] : '';
$key = isset($_REQUEST['key']) ? $_REQUEST['key'] : '';
$sql="INSERT INTO PlaceEnterLog (adventurerid, placeid)
VALUES('".$adventurer_id."','"
	    .$place_id."')";
if($key=="asdlaekqwekasdlkxzc"){
	if(mysql_query($sql)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysql_error()."\"}]";  
	}
}

mysql_close();
?>
