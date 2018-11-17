<!DOCTYPE HTML>
<html>
	<head>
		<title>Club Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../css/main.css" />
		<noscript><link rel="stylesheet" href="../css/noscript.css" /></noscript>
	</head>
		<?php
		session_start();
		extract($_SESSION);
		extract($_POST);
		$_SESSION['clubname']=$clubname;

		$link=mysqli_connect("localhost","root","","portal");

		$sql="SELECT Club_ID from club where Club_name='$clubname'";
		$ret=mysqli_query($link,$sql);
		$clubId=mysqli_fetch_row($ret);
		$clubId=$clubId[0];
		
		$sql="SELECT Admin_USN from admin where Club_ID='$clubId'";
		$ret=mysqli_query($link,$sql);
		$adminId=mysqli_fetch_row($ret);
		$adminId=$adminId[0];
		
		$sql="SELECT Student_name,Student_phoneNo,Student_email from students where Student_USN='$adminId'";
		$ret=mysqli_query($link,$sql);
		$admin=mysqli_fetch_row($ret);
		$adminName=$admin[0];
		$adminPhone=$admin[1];
		$adminEmail=$admin[2];
		
		
	?>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<span class="logo">
									<span class="symbol"><img src="../images/logo.svg" alt="" /></span><span class="title" style="font-size:30px"><?php echo $clubname; ?></span>
								</span>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="../html/clubNames.html">Club Home</a></li>
							<li><a href="generic.html">Gallery</a></li>
							<li><a href="../../pastevents/php/pastevent.php">Past Events</a></li>
							<li><a href="../../EventCalendar/main.html">Calendar</a></li>
							<li><a href="generic.html">Forum</a></li>
							<li><a href="../../FeedbackForm/formpage.html">Feedback</a></li>
							<li><a href="../php/logout.php">Logout</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h2 style="margin-bottom:10px">About Us</h2>
								Club Description
								
							</header>
							</br>
						
							<?php
							
							$sql="SELECT Club_ID from clubjoinform where Club_ID='$clubId'";
							$ret=mysqli_query($link,$sql);
							if (mysqli_num_rows($ret) > 0)
							{
								echo "<h2> Like what this club does?<a style='text-decoration:none;color:blue' href='../Registration/html/club_registration.html'> Join </a> the club </h2>";
								echo "</br>";
							}
							
							?>
							
							<h1> Upcoming Events of <?php echo $clubname ; ?></h1>
							
							<section class="tiles">
								
							<?php				
														
								
								$m="INSERT into past_event SELECT * from create_event WHERE date(date_cur)<CURDATE()";//Delete past events
								$result=mysqli_query($link,$m);
								
								$n="DELETE FROM create_event WHERE date(date_cur)<CURDATE()";
								$result=mysqli_query($link,$n);	
								
								$a="SELECT * from create_event WHERE club_id='$clubId'";
								$result=mysqli_query($link,$a); 
								
								if (mysqli_num_rows($result) > 0)
								{
									$row_count=mysqli_num_rows($result);
									// output data of each row
									$i=0;
									while($row = mysqli_fetch_assoc($result))
									{
										$i++;
										
										echo "<article class='style".$i."'>" ;
											echo "<span class='image'>";
												echo "<img src='../images/pic0".$i.".jpg'/>";
											echo "</span>";
											echo "<a href=''>";
												echo "<h2>". $row['event_name']."</h2>";
												echo "<div class='content'>";
													echo "<p>";
													echo'<span >';
													echo"<br>";
													$newDate = date("d D F", strtotime($row["date_cur"]));
													echo $newDate;
													echo"</span>";
													echo'<span >';
													echo"<br>";
													echo date("g:i a", strtotime($row["time_cur"]));				
													echo'</span>';
													echo"</br>";
													echo"</br>";
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
													echo "</p>";
												echo "</div>";
											echo "</a>";
										echo "</article>";
										
										if($i>=6)
											$i=0;
									}
								}
								
								else
								{
									
									echo "<p> No events </p>";
								}
									
							?>
								
							</section>
						</div>
					</div>

				

		<!-- Scripts -->
			<script src="../js/jquery.min.js"></script>
			<script src="../js/browser.min.js"></script>
			<script src="../js/breakpoints.min.js"></script>
			<script src="../js/util.js"></script>
			<script src="../js/main.js"></script>

	</body>
</html>
