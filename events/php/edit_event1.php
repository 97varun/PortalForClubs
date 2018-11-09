
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	session_start();
	extract($_POST);
	$event_id = $_SESSION['event_id'];
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
		$sql="UPDATE create_event SET date_cur='$date_cur',time_cur='$time_cur',end_time='$end_time',event_name='$event_name',place='$place',more_info='$more_info',invite='$invite' where event_id='$event_id'";

		echo "<script>setTimeout(\"location.href = '../../admin/html/admin.html';\",500);</script>";
		print '<script>alert("Successfully Updated! ");</script>';
		if (mysqli_query($link, $sql))
		{
			echo "Record updated successfully";
		}
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
}
?>
