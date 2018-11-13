

<?php

session_start(); 
extract($_SESSION);

$link=mysqli_connect("localhost","root","","portal");

$sql="SELECT Club_ID from club where Club_name='$clubname'";
$ret=mysqli_query($link,$sql);
$clubId=mysqli_fetch_row($ret);
$clubId=$clubId[0];

$sql="SELECT `Club_ID`, `Member_USN` FROM `club_member` WHERE Club_ID='$clubId' and Member_USN='$srn'";
$ret=mysqli_query($link,$sql);
$r=mysqli_num_rows($ret);
if ($r > 0)
{
	echo $clubname.";"."M"; //Member
}
else
{
	$sql="SELECT * FROM `clubregistration` WHERE Club_ID='$clubId' and Member_USN='$srn'";  
	$ret=mysqli_query($link,$sql);
	$r=mysqli_num_rows($ret);
	if ($r > 0)
	{	
		echo $clubname.";"."A"; //Applied

	}
	else
	{
		echo $clubname.";"."N"; //Nothing
	}
}



?>