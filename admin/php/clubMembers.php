<?php

	session_start();
	$link=mysqli_connect("localhost","root","","portal");
	extract($_SESSION);

	$sql="SELECT Club_ID FROM admin where Admin_USN='$srn';";
	$ret=mysqli_query($link,$sql);
	$row=mysqli_fetch_row($ret);
	$clubID=$row[0];
	
	$sql="SELECT Student_name,Student_USN,Student_phoneNo,Student_email FROM students where Student_USN in (SELECT Member_USN FROM club_member where Club_ID='$clubID');";  
	
	$ret=mysqli_query($link,$sql);
	$rows=mysqli_fetch_all($ret);
	$res=$ret->num_rows;
	
?>
	<title> Club Members</title>
	<link rel='stylesheet' href='../css/clubmembers.css' >
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
	 
	<body style='text-align: center;'>
	<div class='background-image'></div>
	<div class='content'>
	
	  
		<div class="navbar">			
			<a href="../html/admin.html" > Home</a>
			<a href="../php/logout.php" style="float:right" > Logout</a>
		</div>
	
<?php	
	
	if($res>0)
	{
		echo "<div style='margin-top:50px'>";
		echo "<div class='container'>";     
		echo "<table class='table table-hover'>";
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