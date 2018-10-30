<?php

    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    session_start(); // hardcoded for now
    $mysqli = new mysqli("localhost", "root", "", "Portal");
    $result = $mysqli->query("SELECT Student_name FROM students WHERE Student_USN = '" . $_SESSION['usn'] . "'");
    $row = $result->fetch_assoc();
    $string = $row['Student_name'].";".$_SESSION['usn'];
    echo($string);

    // close connection
    mysqli_close($mysqli);
  ?>
