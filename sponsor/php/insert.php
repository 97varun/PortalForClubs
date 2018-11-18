<?php

error_reporting(E_ALL);
$link=mysqli_connect("localhost","root","","portal");
session_start();
extract($_POST);


$sql="INSERT INTO `sponsers` (`sponser_name`, `sponser_email`, `sponser_phoneNo`, `organization_name`, `about_organization`) VALUES('$name','$email','$phoneno','$orgname','$abtorg');";
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