<?php
	error_reporting(E_ALL);
	$link=mysqli_connect("localhost","root","","portal");
	session_start();
	extract($_POST);

	$sql="SELECT `Club_name` FROM `club` WHERE 1;";
	$ret = mysqli_query($link,$sql);

	$clubnames = array();

	while($row = mysqli_fetch_array($ret)) {
	    $clubnames[] = explode(", ", $row[0]);
	}

	echo json_encode($clubnames);

?>