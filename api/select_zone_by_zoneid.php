<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$sql="SELECT Zone.*, ZoneType.imageurl AS zonetypeimage FROM Zone
JOIN ZoneType USING (zonetypeid) WHERE zoneid =".$_GET["zoneid"];
	$res=mysql_query($sql);
	while($row=mysql_fetch_assoc($res)){
	   $output[]=$row;
	}
	print(json_encode($output));
mysql_close();
?>