<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysqli_connect('localhost','root','adminpwd','questio')or die(mysqli_error()); 
mysqli_set_charset($con, "utf8");
$sql="DELETE FROM QuizProgress WHERE adventurerid = ".$_POST["adventurerid"];
$sql="DELETE FROM PuzzleProgress WHERE adventurerid = ".$_POST["adventurerid"];
$sql="DELETE FROM RiddleProgress WHERE adventurerid = ".$_POST["adventurerid"];
$sql="DELETE FROM QuestProgress WHERE adventurerid = ".$_POST["adventurerid"];
if($_REQUEST["key"]=="asdlaekqwekasdlkxzc"){
	if(mysqli_multi_query($con,$sql)){
	   	echo "[{\"status\":\"1\"}]";
	}else{
		echo "[{\"status\":\"2\",\"error\":\"".mysqli_error()."\"}]";  
	}
}

mysqli_close($con);
?>
