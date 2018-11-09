
<?php
	$event_id=$_GET['event_id'];
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

	$m="DELETE from create_event WHERE event_id='$event_id'";
	$result=mysqli_query($link,$m);
			echo "<script>setTimeout(\"location.href = '../../notifications/php/notify1.php';\",500);</script>";

		if (mysqli_query($link, $m))
		{
			//echo "Record updated successfully";
		}
		else 
		{
			echo "Error: " . $m . "<br>" . mysqli_error($link);
		}

?>
