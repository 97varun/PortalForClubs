
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	session_start();
	extract($_POST);
	extract($_SESSION);
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
	$sqll="SELECT fest_id FROM create_fest where club_id=(SELECT Club_ID FROM admin where Admin_USN='$srn')";
	$ret=mysqli_query($link,$sqll);
	$row=mysqli_fetch_row($ret);
	$fest_id=$row[0];
	
	$sql2="SELECT Club_ID FROM admin where Admin_USN='$srn'";
	$ret=mysqli_query($link,$sql2);
	$row=mysqli_fetch_row($ret);
	$club_id=$row[0];
	
	$a="SELECT fest_name from create_fest WHERE fest_name='$fest_event_name'";
	$result=mysqli_query($link,$a);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if(mysqli_num_rows($result)==1)
	{
		$bool=false;
		echo "Redirecting... Please wait..";
		echo "<script>setTimeout(\"location.href = '../../admin/html/admin.html';\",500);</script>";
		print '<script>alert("Fest already created!! ");</script>';
	}
	if($bool==true) // checks if bool is true
	{
		$sql="INSERT INTO create_fest_event (fest_id,club_id,date_cur,time_cur,end_time,fest_event_name,place,more_info,invite) VALUES ('$fest_id',$club_id,'$date_cur','$time_cur','$end_time','$fest_event_name','$place','$more_info','$invite')"; //Inserts the value to table registration
		echo "<script>setTimeout(\"location.href = '../../admin/html/admin.html';\",500);</script>";
		//print '<script>alert("Successfully Registered! ");</script>';
		if (mysqli_query($link, $sql))
		{
			//echo "New record created successfully";
		}
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
	}
}
?>
