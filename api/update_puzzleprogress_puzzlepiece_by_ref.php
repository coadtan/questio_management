<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$sql="UPDATE PuzzleProgress SET topleftopened = '".$_POST["tlstatus"]."' 
,topmidopened = '".$_POST["tmstatus"]."'
,toprightopened = '".$_POST["trstatus"]."'
,midleftopened = '".$_POST["mlstatus"]."'
,midmidopened = '".$_POST["mmstatus"]."'
,midrightopened = '".$_POST["mrstatus"]."'
,bottomleftopened = '".$_POST["blstatus"]."'
,bottommidopened = '".$_POST["bmstatus"]."'
,bottomrightopened = '".$_POST["brstatus"]."'
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
