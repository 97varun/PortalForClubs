<?php
	session_start();
	$event_id = $_GET['event_id'];
	extract($_GET);
	$link=mysqli_connect("localhost","root","","portal");
	extract($_SESSION);
	//echo $srn;
	$sql="SELECT Student_name,Student_USN,Student_phoneNo,Student_email FROM students where Student_USN in (SELECT student_id FROM register_event where event_id='$event_id');";  
	
	$ret=mysqli_query($link,$sql);
	$rows=mysqli_fetch_all($ret);
	$res=$ret->num_rows;
?>
	<link rel='stylesheet' href='../../admin/css/clubmembers.css' >
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>	
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script> 
	<link rel="stylesheet" href="../../admin/css/navigation.css" >
    <script  src="../../admin/js/navigation.js"></script> 
	<body style='text-align: center;'>
	<div class='background-image'></div>
	<div class='content'>
	
<?php	
	if($res>0)
	{
		echo "<div style='margin-top:5px'>";	
		?>		
		<div class="container1" onclick="myFunction(this)">
		  <div class="bar1"></div>
		  <div class="bar2"></div>
		  <div class="bar3"></div>
		</div>
		<div id="myDropdown" style="visibility:hidden;" class="dropdown-content" >
			<a href="../../admin/html/admin.html">Home</a></br>
			<a href="../../notifications/php/registered_students.php">Event Registrations</a></br>
			<a href="../../notifications/php/notify1.php">Upcoming Events</a></br>		
			<a href="../../admin/php/logout.php">Logout</a></br>					 
		</div>
		<?php
		echo "<div class='container'>";     
		echo "<table class='table'id='tab' style='color:white;font-size:20px'>";
			echo "<thead>";
				echo "<tr>";				
					echo "<th>USN</th>";
					echo "<th>Name</th>";
					echo "<th>Phone No.</th>";
					echo "<th>Email</th>";				   
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";	
				foreach($rows as $r)
				{
				echo "<tr>";
					echo "<td>$r[1]</td>";
					echo "<td>$r[0]</td>";
					echo "<td>$r[2]</td>";
					echo "<td>$r[3]</td>";
				echo "</tr>";
				}
			echo "</tbody>";
		echo "</table>"; 
		echo "</div>";
		echo "</div>";		
	}	
	else
	{
		echo "No Members";
	}
	
	
?>
</div>
</body>
