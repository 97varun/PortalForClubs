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
							<li><a href="../html/clubNames.html">Home</a></li>
							<li><a href="generic.html">Gallery</a></li>
							<li><a href="../../pastevents/php/pastevent.php">Past Events</a></li>
							<li><a href="generic.html">Forum</a></li>
							<li><a href="generic.html">Feedback</a></li>
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
							<h1> Upcoming Events </h1>
							<section class="tiles">
	
								<article class="style1">
									<span class="image">
										<img src="../images/pic01.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Upcoming event 1</h2>
										<div class="content">
											<p>A summary of the event.</p>
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="../images/pic02.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Upcoming Event 2</h2>
										<div class="content">
											<p>Summary of event 2</p>
										</div>
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="../images/pic03.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Upcoming Event 3</h2>
										<div class="content">
											<p>Summary of event 3</p>
										</div>
									</a>
								</article>
								<article class="style4">
									<span class="image">
										<img src="../images/pic04.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Upcoming Event 4</h2>
										<div class="content">
											<p>Summary of event 4</p>
										</div>
									</a>
								</article>
								
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
