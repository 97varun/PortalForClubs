<!DOCTYPE html>

<html>
<?php

	extract($_POST);
	#echo $clubname;
	session_start();
	$_SESSION['clubname']=$clubname;

	
 ?>
 
 
<head>
<title> Club Home page </title>
</head>

<frameset  framespacing="0" cols="14%,*" frameborder=no>
  <frame src="../html/clubframe_a.html" frameborder="0">
  <frameset framespacing="0" rows="28%,*" frameborder=no>
	  <frame src="../php/clubframe_r1.php" frameborder="0">
	  <frame src="../html/clubframe_r2.html" frameborder="0">
  
  </frameset>
</frameset>

</html>
