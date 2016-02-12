<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$points = 9;
$result = mysql_query("SELECT * FROM PuzzleProgress WHERE adventurerid = '".$_POST["adventurerid"]."'
			 AND questid = '".$_POST["questid"]."'") or die(msyql_error());
if($_POST["key"]=="asdlaekqwekasdlkxzc"){
	$row = mysql_fetch_assoc($result);

	$tl =  $row['topleftopened'];
	$tm =  $row['topmidopened'];
	$tr =  $row['toprightopened'];
	$ml =  $row['midleftopened'];
	$mm =  $row['midmidopened'];
	$mr =  $row['midrightopened'];
	$bl =  $row['bottomleftopened'];
	$bm =  $row['bottommidopened'];
	$br =  $row['bottomrightopened'];

	$temp = $tl + $tm + $tr + $ml + $mm + $mr + $bl + $bm + $br;

	$points = $points - $temp;
	$points++;
	echo "[{\"points\":\"$points\"}]";
}
mysql_close();
?>
