<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$result = mysql_query("SELECT SUM(score) AS score, COUNT(*) AS scorecount FROM QuizProgress WHERE adventurerid = ".$_POST["adventurerid"]." AND questid = ".$_POST["questid"]) or die(mysql_error());
$row = mysql_fetch_assoc($result);
$score = $row['score'];
$scorecount = $row['scorecount'];

$totalscore = ceil($score / (($scorecount * 2)/10));
$sql="UPDATE QuestProgress SET statusid = '".$_POST["statusid"].
			"',score = '".$totalscore.
			"' WHERE questid = '".$_POST["questid"].
			"' AND adventurerid = '".$_POST["adventurerid"]."'";
if($_POST["key"]=="asdlaekqwekasdlkxzc"){
	if(mysql_query($sql)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysql_error()."\"}]";  
	}
}

mysql_close();
?>

