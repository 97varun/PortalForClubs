<html>
	
	<head>
		<style>
			* { background-color:#F76C6C}
			.h1{
				font-family:verdana;
				
				font-size:50px;
				text-align:center;
				
			}
			div span{
				display: block;
			}
		</style>
		
	</head>
	<?php
		session_start();
		extract($_SESSION);
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
	<p style="top:20px"></p>
	<div class="h1"><?php echo $clubname; ?>
	<div style="text-align:center;font-size:20px" ><span style="float:center">Club description</span>
	<div class="c1" style="width:30%;float:right;font-size:20px;"><span><?php echo $adminName;?> </span>
	<span><?php echo $adminPhone; ?> </span>  <span> <?php echo "\n"; echo $adminEmail; ?> </span>	</div></div>
	</div>
</html>