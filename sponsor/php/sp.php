<?php

error_reporting(E_ALL);
$link=mysqli_connect("localhost","root","","portal");
session_start();
extract($_POST);

$clubname = $_SESSION['clubname'];
//$_SESSION["srn"]=$usn;


$sql="SELECT * FROM `sponsors` WHERE `Club_name`='$clubname';";
$ret=mysqli_query($link,$sql);
$rows=mysqli_fetch_all($ret);
$res=$ret->num_rows;
?>


<html>
<head>
<title>Sponsors	</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/admin.css" >
	<link rel='stylesheet' href='../css/clubmembers.css' >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../js/admin.js"> </script>
</head>

<body style='text-align: center;'>
	<div class='background-image'></div>
	<div class='content'>

	<div class="navbar">
			<a href="../php/logout.php" style="float:right">Logout</a>
			<a href="../../admin/html/admin.html" style="float:right">Home</a>
	</div>


	<div id="wrapper">

		<section id="main">

			<header>
				<!--<span class="avatar"><img src="images/avatar.jpg" alt="" /></span>-->
				<h1> Sponsors </h1>
			</header>

			<br />

			<?php	
				if($res>0)
				{
					echo "<div style='margin-top:5px'>";	
			?>

			<?php     
			echo "<table class='table'id='tab' style='color:black;font-size:13px'>";
				echo "<thead>";
					echo "<tr>";

						echo "<th>Name</th>";
						echo "<th>Organisation</th>";
						echo "<th>Phone No.</th>";
						echo "<th>Email</th>";
					   
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
			
					foreach($rows as $r)
					{
						echo "<tr>";
						echo "<td>$r[0]</td>";
						echo "<td>$r[3]</td>";
						echo "<td>$r[2]</td>";
						echo "<td>$r[1]</td>";
					echo "</tr>";
					}
				echo "</tbody>";
			echo "</table>"; 
			echo "</div>";
			
		}
		
		
	?>
		
		</section>

	</div>

</div>

</body>
</html>
