<?php

	extract($_GET);
	//echo $usntodelete;
	session_start();
	$link=mysqli_connect("localhost","root","","portal");
	extract($_SESSION);

	$sql="SELECT Club_ID FROM admin where Admin_USN='$srn';";
	$ret=mysqli_query($link,$sql);
	$row=mysqli_fetch_row($ret);
	$clubID=$row[0];
	
	$sql="DELETE FROM `clubregistration` WHERE Club_ID='$clubID' and Member_USN='$usntoadd'" ;
	$ret=mysqli_query($link,$sql);
	
	$sql="INSERT INTO `club_member`(`Club_ID`, `Member_USN`) VALUES ('$clubID','$usntoadd')";
	$ret=mysqli_query($link,$sql);
?>

<body onload="window.location='../php/registered.php'">
</body>