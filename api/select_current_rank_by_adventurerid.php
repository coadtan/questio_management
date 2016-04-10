<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$sql="SELECT rank, guserid, displayname, score FROM
(SELECT func_count_row() AS rank, guserid, displayname, score, adventurerid FROM
(SELECT guserid, a.adventurerid AS adventurerid, displayname, SUM(a.score) AS score
FROM QuestProgress a
JOIN Adventurer c USING (adventurerid)
JOIN AdventurerDetails d USING (detailid)
GROUP BY adventurerid ORDER BY score DESC) b
ORDER BY rank) c
WHERE rank BETWEEN 1 and 10
AND adventurerid = ".$_REQUEST['adventurerid'];
if($_REQUEST["key"]=="asdlaekqwekasdlkxzc"){
	$res=mysql_query($sql);
	while($row=mysql_fetch_assoc($res)){
	   $output[]=$row;
	}
	print(json_encode($output));
}
mysql_close();
?>
