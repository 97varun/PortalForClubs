
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	session_start();
	extract($_POST);
	extract($_SESSION);
	$bool = true;
	$servername = "localhost";
	$username1 = "root";
	$password1 = "";
	$dbname = "portal";
	$link = mysqli_connect($servername, $username1, $password1, $dbname);
	// Check connection
	if (!$link)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	$sqll="SELECT Club_ID FROM admin where Admin_USN='$srn';";
	$ret=mysqli_query($link,$sqll);
	$row=mysqli_fetch_row($ret);
	$club_id=$row[0];
	$a="SELECT event_name from create_event WHERE event_name='$event_name'";
	$result=mysqli_query($link,$a);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if(mysqli_num_rows($result)==1)
	{
		$bool=false;
		echo "Redirecting... Please wait..";
		echo "<script>setTimeout(\"location.href = '../../admin/html/admin.html';\",500);</script>";
		print '<script>alert("Event already created!! ");</script>';
	}
	if($bool==true) // checks if bool is true
	{
		$sql="INSERT INTO create_event (club_id,date_cur,time_cur,end_time,event_name,place,more_info,invite) VALUES ('$club_id','$date_cur','$time_cur','$end_time','$event_name','$place','$more_info','$invite')"; //Inserts the value to table registration
		echo "<script>setTimeout(\"location.href = '../../admin/html/admin.html';\",500);</script>";
		print '<script>alert("Successfully Registered! ");</script>';
		if (mysqli_query($link, $sql))
		{
			echo "New record created successfully";
		}
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
	}
}
?>
