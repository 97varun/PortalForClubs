<?php

	session_start();
	$link=mysqli_connect("localhost","root","","portal");
	extract($_SESSION);

	$sql="SELECT Club_ID FROM admin where Admin_USN='$srn';";
	$ret=mysqli_query($link,$sql);
	$row=mysqli_fetch_row($ret);
	$clubID=$row[0];
	
	$sql="SELECT *Student_name,Student_USN,Student_phoneNo,Student_email FROM students where Student_USN in (SELECT Member_USN FROM club_member where Club_ID='$clubID');";  
	
	$sql="SELECT `Member_USN`, `Sem`, `Branch`, `ReasonToJoin` FROM `clubregistration` WHERE Club_ID='$clubID'";
	
	$ret=mysqli_query($link,$sql);
	$rows=mysqli_fetch_all($ret);
	$res=$ret->num_rows;
	
?>
	<title> Registered Members</title>
	<link rel='stylesheet' href='../css/clubmembers.css' >
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

	 <link rel="stylesheet" href="../css/navigation.css" >
    	  <script  src="../js/navigation.js"></script> 

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
			<a href="../html/admin.html">Home</a></br>
			<a href="../php/logout.php">Logout</a></br>
					 
		</div>
		<?php
		echo "<div class='container'>";     
		echo "<table class='table' id='tab' style='color:white;font-size:20px'>";
			echo "<thead>";
				echo "<tr>";
				
					echo "<th>USN</th>";
					echo "<th>Name</th>";
					echo "<th>Phone No.</th>";
					echo "<th>Email</th>";
					echo "<th>Branch</th>";
					echo "<th>Sem</th>";
					echo "<th>ReasonToJoin</th>";
				   
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
		
				foreach($rows as $r)
				{
				$sql="SELECT Student_name,Student_phoneNo,Student_email FROM students where Student_USN='$r[0]'";
				$ret=mysqli_query($link,$sql);
				$x=mysqli_fetch_row($ret);
				
				echo "<tr>";
					echo "<td>$r[0]</td>";
					echo "<td>$x[0]</td>";
					echo "<td>$x[1]</td>";
					echo "<td>$x[2]</td>";
					echo "<td>$r[2]</td>";
					echo "<td>$r[1]</td>";
					echo "<td>$r[3]</td>";
					echo "<td><a style='text-decoration:none;color:red;font-size:20px'  href=../php/deleteregistration.php?usntodelete=",urlencode($r[0]),">Remove</a></td>";
					echo "<td><a style='text-decoration:none;color:orange;font-size:20px' href=../php/addregistration.php?usntoadd=",urlencode($r[0]),">Add</a></td>";
				echo "</tr>";
				}
			echo "</tbody>";
		echo "</table>"; 
		echo "</div>";
		echo "</div>";
		
	}
	
	else
	{
		echo "<p style='color:red;font-size:50px'>No Registrations</p>";
	}
	
	
?>
</div>
</body>
