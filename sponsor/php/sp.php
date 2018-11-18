<?php

error_reporting(E_ALL);
$link=mysqli_connect("localhost","root","","portal");
session_start();
extract($_POST);
//$_SESSION["srn"]=$usn;


$sql="SELECT * from `sponsers` ";
 $ret=mysqli_query($link,$sql);

 
?>
<html>
<head>
<title>Sponser Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sponser Registration </title>
	
    <script src="../js/query.min.js"></script>
    <script src="../js/main.js"></script>
    <script src = "../js/register.js"></script>
    <!-- Main css -->
    
	<style>
	
	*{
		color:white;
	}
	html { 
  background: url(../../events/images/pic1.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
	</style>
	<link rel="stylesheet" href="../css/navigation.css" >
	<script  src="../js/navigation.js"></script> 
</head>
<body>

<center><h2>Sponsor Page<h2></center>

<div style="float:right">
<div class="container" onclick="myFunction(this)" >
	  <div class="bar1"></div>
	  <div class="bar2"></div>
	  <div class="bar3"></div>
	</div>
	<div id="myDropdown" style="visibility:hidden;" class="dropdown-content" >
		<a href="../../admin/html/admin.html">Home</a></br>
		<a href="../../EventCalendar/main.html">Calendar</a></br>
		<a href="../php/logout.php">Logout</a>
	 
</div>
</div>


<?php 
//echo (mysqli_fetch_array($ret)['sponser_name']);
//$row=mysqli_fetch_array($ret);
//echo nl2br($row[0]."\n".$row[1]."\n".$row[2]."\n".$row[3]."\n".$row[4]);

if (mysqli_num_rows($ret) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($ret)) {
        echo "<B>Organization_name: </B>" . $row["organization_name"]. "<br>" . "<B>About: </B>".$row["about_organization"]."<br>". "<B>Email: </B>".$row["sponser_email"]."<br><br>";
    }
} else {
    echo "0 results";
}
?>
</body>
</html>