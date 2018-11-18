<!DOCTYPE html>
<html lang="en">
	<head>
		<h1 style="font-size:50px;text-align:center;"><b>Upcoming Fests</b></h1>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../notifications/css/main2.css" />
		
		<!--Menu Bar-->
		<link rel="stylesheet" href="../../admin/css/navigation.css" >
		<script  src="../../admin/js/navigation.js"></script> 
		
			<div class="container1" onclick="myFunction(this)">
		  <div class="bar1"></div>
		  <div class="bar2"></div>
		  <div class="bar3"></div>
		</div>
		<div id="myDropdown" style="visibility:hidden;" class="dropdown-content" >
			<a href="../../admin/html/admin.html">Home</a></br>
			<a href="../../notifications/php/registered_students.php">Event Registrations</a></br>
			<a href="../../admin/php/logout.php">Logout</a></br>					 
		</div>
		<!-- --->
	</head>
	<body class="is-preload">
		<?php
			session_start();
			$servername = "localhost";
			$username1 = "root";
			$password1 = "";
			$dbname = "portal";
			$link = mysqli_connect($servername, $username1, $password1, $dbname);
			// Check connection
			extract($_SESSION);
			if (!$link)
			{
				die("Connection failed: " . mysqli_connect_error());
			}	
			//$m="INSERT into past_event SELECT * from create_event WHERE date(date_cur)<CURDATE()";//Delete past events
			//$result=mysqli_query($link,$m);
			$n="DELETE FROM create_fest WHERE date(date_cur)<CURDATE()";
			$result=mysqli_query($link,$n);	
			$a="SELECT * from create_fest WHERE club_id IN (SELECT admin.club_id FROM admin,create_fest where admin.Club_id=create_fest.club_id and admin.Admin_USN='$srn')";
			$result=mysqli_query($link,$a); 	
			echo'<hr />';
			echo'<div class="container-fluid">';
			if (mysqli_num_rows($result) > 0)
			{
				$row_count=mysqli_num_rows($result);
				// output data of each row
				while($row = mysqli_fetch_assoc($result))
				{
					echo'<div class="col-lg-3 " id="rcorners3" >';
					echo'<div class="bg-primary text-right nested_div">';
					echo'<span class="position_text">';
					echo"<br>";
					$newDate = date("d D F", strtotime($row["date_cur"]));
					echo $newDate;
					echo"</span>";
					echo'<span class="position_text">';
					echo"<br>";
					echo date("g:i a", strtotime($row["time_cur"]));				
					echo'</span>';
					echo"</br>";
					echo'</div>';
					echo"<br>";
					echo'<span class="bold_text">';
					echo $row["fest_name"];
					echo'</span>';
					echo"<br>";
					echo' <img src="../images/location_icon.png" alt="Fjords" height="12" width="12">';
					echo' ';
					echo $row["place"];
					echo"<br>";
					echo' <img src="../images/more_info.png" alt="Fjords" height="12" width="12">';
					echo' ';
					echo $row["more_info"];
					echo"<br>";
					echo' <img src="../images/invite.png" alt="Fjords" height="12" width="12">';
					echo' ';
					echo $row["invite"];
					echo"<br>";
					echo str_repeat("&nbsp;", 15);
					//echo "<a href=../../fest_form/php/edit_event.php?fest_id=",urlencode($row["fest_id"]),">edit</a>";
					//echo str_repeat("&nbsp;", 10);
					//echo "<a href=../../fest_form/php/delete_event.php?fest_id=",urlencode($row["fest_id"]),">delete</a>";
					
					
					echo"<br>";
					echo "<a href=../../Fest/php/fest_event_page.php?fest_id=",urlencode($row["fest_id"]),">view fest</a>";
					echo"<br>";
					echo"</div>";
				}
				echo'</div>';
			}
			echo"</div>"
		?>
		<script src="../js/fest_form.js"> </script>
	</body>
</html>
