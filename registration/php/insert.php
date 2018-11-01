<?php


$link=mysqli_connect("localhost","root","","portal");
session_start();
extract($_POST);
$_SESSION["srn"]=$usn;
$_SESSION["role"]="Student";

$sql="INSERT INTO `students` (`Student_name`, `Student_USN`, `Student_password`, `Student_phoneNo`, `Student_email`) VALUES('$name','$usn','$password','$phoneno','$email');";
 $ret=mysqli_query($link,$sql);
 
?>
<html>
<script>
	function load()
	{
		window.location="../../student/html/student.html";
		
	}
</script>
	<body onload="load()">
	</body>
</html>