<?php

	session_start();
	$link=mysqli_connect("localhost","root","","portal");
	extract($_SESSION);

	$sql="SELECT Club_ID FROM admin where Admin_USN='$srn';";
	$ret=mysqli_query($link,$sql);
	$row=mysqli_fetch_row($ret);
	$clubID=$row[0];
	
	$sql="SELECT Club_ID from clubjoinform where Club_ID='$clubID'";
	$ret=mysqli_query($link,$sql);
	$r=mysqli_num_rows($ret);
	if ($r > 0)
	{
		echo $r;
	}
	else
	{
		$sql="INSERT INTO `clubjoinform`(`Club_ID`) VALUES ('$clubID');";
		$ret=mysqli_query($link,$sql);
		echo $r;
	}
?>
