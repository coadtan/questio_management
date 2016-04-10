<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$sql="SELECT * FROM Item WHERE itemid in ("
	.$_POST["headid"].","
	.$_POST["backgroundid"].","
	.$_POST["neckid"].","
	.$_POST["bodyid"].","
	.$_POST["handleftid"].","
	.$_POST["handrightid"].","
	.$_POST["armid"].","
	.$_POST["legid"].","
	.$_POST["footid"].","
	.$_POST["specialid"].")";
if($_POST["key"]=="asdlaekqwekasdlkxzc"){	
	$res=mysql_query($sql);
	while($row=mysql_fetch_assoc($res)){
	   $output[]=$row;
	}
	print(json_encode($output));
}
mysql_close();
?>
