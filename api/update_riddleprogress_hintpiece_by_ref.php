<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$sql="UPDATE RiddleProgress SET 
hint1opened = '".$_POST["hint1status"]."' 
,hint2opened = '".$_POST["hint2status"]."'
,hint3opened = '".$_POST["hint3status"]."'
WHERE ref = '".$_POST["ref"]."'";
if($_POST["key"]=="asdlaekqwekasdlkxzc"){
	if(mysql_query($sql)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysql_error()."\"}]";  
	}
}
mysql_close();
?>
