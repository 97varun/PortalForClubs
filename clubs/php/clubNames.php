<?php

	
		$link=mysqli_connect("localhost","root","","portal");
		session_start();
		$sql="SELECT Club_name FROM club;";
		$ret=mysqli_query($link,$sql);
		$r=mysqli_fetch_all($ret);
		$rows=array();
		foreach($r as $i)
			array_push($rows,$i[0]);
		
		echo json_encode($rows);	
		
	
?>