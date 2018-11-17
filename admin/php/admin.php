<?php
   

	session_start(); 

    $mysqli = new mysqli("localhost", "root", "", "portal");

	//$_SESSION['srn']=1;
    $result = $mysqli->query("SELECT Student_name FROM students WHERE Student_USN = '" . $_SESSION['srn'] . "'");
    $row = $result->fetch_assoc();
    $string = $row['Student_name'].";".$_SESSION['srn'];
    

    $link=mysqli_connect("localhost","root","","portal");
	extract($_SESSION);
    $srn = $_SESSION['srn'];

    $sql="SELECT Club_ID FROM admin where Admin_USN='$srn';";
	$ret=mysqli_query($link,$sql);
	$row=mysqli_fetch_row($ret);
	$clubID=$row[0];


	$sql="SELECT Club_name FROM club where Club_ID='$clubID';";
	$ret=mysqli_query($link,$sql);
	$row=mysqli_fetch_row($ret);
	$clubname=$row[0];
	$_SESSION['clubname']=$clubname;

echo($string);
    // close connection
    mysqli_close($mysqli);
  ?>
