
<?php

	$bool = true;
	$servername = "localhost";
	$username1 = "root";
	$password1 = "";
	$dbname = "portal";
	session_start();
	extract($_POST);
	echo"g";
	$srn=$_POST['srn'];
$fest_event_id=$_POST["fest_event_id"];
	$link = mysqli_connect($servername, $username1, $password1, $dbname);
	// Check connection
	if (!$link)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo($srn);
	//echo($event_id);
	$y="SELECT * FROM register_fest_event where student_id='$srn' and event_id='$fest_event_id';";
	    $result=mysqli_query($link,$y);
if(mysqli_num_rows($result)==0){

	$m="INSERT INTO register_fest_event (student_id,fest_event_id) VALUES ('$srn','$fest_event_id');";
		if (mysqli_query($link, $m))
		{
			echo "1";
			//echo "Record updated successfully";
		}
		else 
		{
			echo "Error: " . $m . "<br>" . mysqli_error($link);
		}
	
		
}

else{
	
	echo "-1";
}
		
		

?>
