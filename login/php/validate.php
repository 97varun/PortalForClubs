<?php


$link=mysqli_connect("localhost","root","","portal");
session_start();
extract($_POST);

$srn=$_POST["srn"];
$pass=$_POST["pass"];
$role=$_POST["role"];
$_SESSION["srn"]=$srn;
$_SESSION["role"]=$role;
/*
extract($_GET);
$srn=$_GET["srn"];
$pass=$_GET["pass"];
$role=$_GET["role"];
//echo $pass;
*/
if($role=="Admin")
{
	$sql="SELECT * FROM admin where Admin_USN='$srn' and Admin_password='$pass';";
    $ret=mysqli_query($link,$sql);
	$rows=mysqli_fetch_row($ret);
	$res=$ret->num_rows;
	if($res==0)
	{
		echo "-1";
	}
	else
	{
		echo "1";
	}
	
	
}
else if($role=="Student")
{
	$sql="SELECT * FROM students where Student_USN='$srn' and Student_password='$pass';";
    $ret=mysqli_query($link,$sql);
	//echo $ret;
	$rows=mysqli_fetch_row($ret);
	$res=$ret->num_rows;
/*echo $res;
	echo $rows[0];
	echo $rows[1];
	*/
	if($res==0)
	{
		echo "-1";
	}
	else
	{
		echo "1";
	}
	
	
}


?>
