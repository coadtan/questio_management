<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$sql="INSERT INTO QuestProgress (adventurerid, questid, statusid
, score, zoneid, questtypeid)
VALUES('".$_POST["adventurerid"]."','"
	    .$_POST["questid"]."',
	    1,
		0,'"
		.$_POST["zoneid"]."','"
		.$_POST["questtypeid"]."')";
if($_POST["key"]=="asdlaekqwekasdlkxzc"){
	if(mysql_query($sql)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysql_error()."\"}]";  
	}
}

mysql_close();
?>
