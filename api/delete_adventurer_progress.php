<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysqli_connect('localhost','root','adminpwd','questio')or die(mysqli_error()); 
mysqli_set_charset($con, "utf8");
$sql="DELETE FROM QuizProgress WHERE adventurerid = ".$_REQUEST["aid"].";";
$sql2="DELETE FROM PuzzleProgress WHERE adventurerid = ".$_REQUEST["aid"].";";
$sql3="DELETE FROM RiddleProgress WHERE adventurerid = ".$_REQUEST["aid"].";";
$sql4="DELETE FROM QuestProgress WHERE adventurerid = ".$_REQUEST["aid"].";";
$sql5="DELETE FROM HallOfFame WHERE adventurerid = ".$_REQUEST["aid"].";";
$sql6="DELETE FROM Inventory WHERE adventurerid = ".$_REQUEST["aid"].";";
if($_REQUEST["key"]=="asdlaekqwekasdlkxzc"){
	if(mysqli_query($con,$sql)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysqli_error($con)."\"}]";  
	}
	echo "\n";
	if(mysqli_query($con,$sql2)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysqli_error($con)."\"}]";  
	}
	echo "\n";
	if(mysqli_query($con,$sql3)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysqli_error($con)."\"}]";  
	}
	echo "\n";
	if(mysqli_query($con,$sql4)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysqli_error($con)."\"}]";  
	}
	echo "\n";
	if(mysqli_query($con,$sql5)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysqli_error($con)."\"}]";  
	}
	echo "\n";
	if(mysqli_query($con,$sql6)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysqli_error($con)."\"}]";  
	}
}
mysqli_close($con);
?>
