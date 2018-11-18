<?php

error_reporting(E_ALL);
$link=mysqli_connect("localhost","root","","portal");
session_start();
extract($_POST);


$sql="INSERT INTO `sponsors` (`sponsor_name`, `sponsor_email`, `sponsor_phone`, `organisation_name`, `club_name`) VALUES('$name','$email','$phoneno','$orgname', '$club');";
 $ret=mysqli_query($link,$sql);
 //echo $ret.$name
 $sql="SELECT * from `sponsers` ";
 $ret=mysqli_query($link,$sql);
 
?>	
<html>
<script>
	function load()
	{
		 window.location="../../login/html/login.html";
		
	}
</script>
	<body onload="load()">
	</body>
</html>