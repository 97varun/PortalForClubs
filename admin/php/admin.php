<?php
   

	session_start(); 
    $mysqli = new mysqli("localhost", "root", "", "portal");
	//$_SESSION['srn']=1;
    $result = $mysqli->query("SELECT Student_name FROM students WHERE Student_USN = '" . $_SESSION['srn'] . "'");
    $row = $result->fetch_assoc();
    $string = $row['Student_name'].";".$_SESSION['srn'];
    echo($string);
    // close connection
    mysqli_close($mysqli);
  ?>