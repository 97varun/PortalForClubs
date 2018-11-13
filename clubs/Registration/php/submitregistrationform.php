<?php

session_start();
extract($_POST);
extract($_SESSION);

$link=mysqli_connect("localhost","root","","portal");

$sql="SELECT Club_ID from club where Club_name='$clubname'";
$ret=mysqli_query($link,$sql);
$clubId=mysqli_fetch_row($ret);
$clubId=$clubId[0];


$sql="INSERT INTO `clubregistration`(`Club_ID`, `Member_USN`, `Sem`, `Branch`, `ReasonToJoin`) VALUES ('$clubId','$srn','$sem','$branch','$club')";
$ret=mysqli_query($link,$sql);

?>

<body onload="window.location='../../php/clubpage.php'" >
</body>