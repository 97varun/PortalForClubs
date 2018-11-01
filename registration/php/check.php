<?php
	session_start();
	$mysqli = new mysqli("localhost", "root", "", "portal");
	extract($_POST);
	if(isset($_POST['name'])){
		$sql = "SELECT count(1) FROM students WHERE Student_name = '" . $_POST['name'] . "'";
		$stmt = $mysqli->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($found);
		$stmt->fetch();
		if($found){
			echo '-1';
		}
		else{
			echo '0';
		}
	}
	else if(isset($_POST['usn'])){
		$sql = "SELECT count(1) FROM students WHERE Student_usn = '" . $_POST['usn'] . "'";
		$stmt = $mysqli->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($found);
		$stmt->fetch();
		if($found){
			echo '-1';
		}
		else{
			echo '0';
		}
	}
	
	else if(isset($_POST['email'])){
		$sql = "SELECT count(1) FROM students WHERE Student_email = '" . $_POST['email'] . "'";
		$stmt = $mysqli->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($found);
		$stmt->fetch();
		if($found){
			echo '-1';
		}
		else{
			echo '0';
		}
	}



	

?>
