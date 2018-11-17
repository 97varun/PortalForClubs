<?php
   

	session_start(); 
    $mysqli = new mysqli("localhost", "root", "", "portal");
	//$_SESSION['srn']=1;
    $result = $mysqli->query("SELECT Student_name FROM students WHERE Student_USN = '" . $_SESSION['srn'] . "'");
    $row = $result->fetch_assoc();
	
	$result = $mysqli->query("SELECT Club_ID FROM admin WHERE Admin_USN = '" . $_SESSION['srn'] . "'");
    $x = $result->fetch_assoc();
	
	$result = $mysqli->query("SELECT Club_name FROM club WHERE Club_ID = '" . $x['Club_ID'] . "'");
    $r = $result->fetch_assoc();
	
    $string = $row['Student_name'].";".$r['Club_name'];
    echo($string);
    // close connection
    mysqli_close($mysqli);
  ?>
