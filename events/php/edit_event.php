

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../css/main.css" />
</head>
<body class="is-preload">
<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	$event_id = $_GET['event_id'];
	extract($_GET);
	session_start();
	$_SESSION['event_id'] = $event_id;
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
	$sql="SELECT * from create_event WHERE event_id='$event_id'";
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	
}
?>
	<div id="wrapper">
		<section id="main">
			<h1>Edit Event</h1>
			<hr />
			<form method="POST" action="../php/edit_event1.php">
				Date<span>*</span><input type="date" name="date_cur" value="<?php echo $row['date_cur']; ?>"></input>
				<br><br>

				Time<span>*</span><input type="time" name="time_cur" value="<?php echo $row['time_cur']; ?>"></input>
				<br><br>

				Add End Time<span>*</span><input type="time" name="end_time" value="<?php echo $row['end_time']; ?>"></input>
				<br><br>

				What are you planning?<span>*</span><input type="text" name="event_name" placeholder="Type Here..."  value="<?php echo $row['event_name']; ?>" ></input>
				<br><br>

				Where?<span>*</span><input type="text" name="place" value="<?php echo $row['place']; ?>" ></input>
				<br><br>

				More Information?<input type="text" name="more_info" value="<?php echo $row['more_info']; ?>" ></input>
				<br><br>

				Who is invited?<input type="text" name="invite" value="<?php echo $row['invite']; ?>" > </input>
				<br>

				<p class="mandate">Fields marked with * are mandatory </p>
				<input name="update" type="submit" class="button" value="Update" />
			</form>
			<hr />
		</section>
		<footer id="footer">
		</footer>
	</div>

<script src="../js/edit_event.js"> </script>
</body>
</html>
