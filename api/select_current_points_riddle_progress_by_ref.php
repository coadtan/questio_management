<?php
header("content-type:text/javascript;charset=utf-8");
$con=mysql_connect('localhost','root','adminpwd')or die(mysql_error()); 
mysql_select_db('questio')or die(mysql_error());
mysql_query("SET NAMES UTF8");
$points = 0;
$result = mysql_query("SELECT * FROM RiddleProgress WHERE adventurerid = '".$_POST["adventurerid"]."'
			 AND questid = '".$_POST["questid"]."'") or die(msyql_error());
if($_POST["key"]=="asdlaekqwekasdlkxzc"){
	$row = mysql_fetch_assoc($result);
	if($row==null){
		echo "null";
	}else{

	$scantime =  $row['scanlimit'];
	$h1 =  $row['hint1opened'];
	$h2 =  $row['hint2opened'];
	$h3 =  $row['hint3opened'];

	switch ($scantime) {
		case 4:
			$points = $points + 4;
			break;
		case 3:
			$points = $points + 4;
			break;
		case 2:
			$points = $points + 3;
			break;
		case 1:
			$points = $points + 2;
			break;
		case 0:
			$points = $points + 1;
			break;
	}

		

	if($h1 == 0 && $h2 == 0 && $h3== 0){
		$points = $points + 6;
	}else{
		$hintopentime = 0;
		if($h1 == 1){
			$hintopentime++;
		}
		if($h2 == 1){
			$hintopentime++;
		}
		if($h3 == 1){
			$hintopentime++;
		}
		switch ($hintopentime) {
			case 1:
				$points = $points + 5;
				break;
			case 2:
				$points = $points + 3;
				break;
			case 3:
				$points = $points + 0;
				break;
		}

	}



	echo "[{\"points\":\"$points\"}]";
	}
}

mysql_close();
?>
