<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Past Events </title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/pastevent.css" />
	</head>
	<body class="is-preload">
		
		<div class="navbar">			
			<a href="../../clubs/php/clubpage.php" > Home</a>
			<a href="../php/logout.php" style="float:right" > Logout</a>
		</div>
		<h1 style="font-size:50px;text-align:center;"><b>Past Events</b></h1>
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
			extract($_SESSION);
			
			$r="SELECT Club_id from club where Club_name='$clubname';";
			$result=mysqli_query($link,$r);			
			$row=mysqli_fetch_row($result);
			$cid=$row[0];
			
			$a="SELECT * from past_event WHERE club_id='$cid'";
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
					echo $row["event_name"];
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
					echo "<a style='text-decoration: none;' class='button'  href='#' > FeedBack</a>";
					echo "<br>" ;
					echo str_repeat("&nbsp;", 10);
					
					echo"</div>";
				}
				echo'</div>';
			}
			echo"</div>"
		?>
		<script src="../js/pastevent.js"> </script>
	</body>
</html>