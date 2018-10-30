<!DOCTYPE html>
<html lang="en">
<head>
<style>
[class*="col-"] {
    margin-bottom: 25px; 
	margin-right: 25px;
	margin-left: 65px;
	background-color:white;
}
.container-fluid{
	padding: 0px 0px;
}
h1 {
	padding: 20px 65px;
	font-size:60px;
}
.nested_div{
	margin-right: -15px;
	margin-left: -15px;
}
.position_text{
		margin-right: 10px;
}
.bold_text{
	font-weight:bold;
	font-size:25px;
	color:black;
	}
div{
	color:dimgray;
	
}
#rcorners3 {
    border-radius: 15px;
 
}
</style>
<h1 style="font-size:30px"><b>Upcoming Events</b></h1>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body style="background-color:gainsboro">
<script>
$(function() {
    $(".bg-primary").each(function() {
		//brightness=3;
    //var rgb = [Math.random() * 256, Math.random() * 256, Math.random() * 256];
    //var mix = [brightness*51, brightness*51, brightness*51]; //51 => 255/5
   // var mixedrgb = [rgb[0] + mix[0], rgb[1] + mix[1], rgb[2] + mix[2]].map(function(x){ return Math.round(x/2.0)})
    //var hue ='rgb(' + mixedrgb.join(",") + ')';
		//var hue = 'rgb(' + (Math.floor((198-0)*Math.random()) + 150) + ',' + (Math.floor((256-199)*Math.random()) + 200) + ',' + (Math.floor((256-199)*Math.random()) + 200) + ')';
var colors=['#FF0000','#FFA500','#0000FF','#800080','#008000','#000000','#808080','#964B00','#D2B48C'];
		var hue=colors[Math.floor(Math.random() * colors.length)];
		$(this).css("background-color", hue);
		$(this).css("color", "white");
		$(this).css("font-weight"," bold");
    });
});
</script>

<?php
$servername = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "portal";
$link = mysqli_connect($servername, $username1, $password1, $dbname);
// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}	
$a="SELECT * from create_event";
$m="DELETE FROM 'create_event' WHERE (DATE('date') < DATE(NOW()))";
$result1=mysqli_query($link,$m); //To delete the past events

$result=mysqli_query($link,$a); 
	echo'<div class="container-fluid">';
	echo'<div class="row">';
	if (mysqli_num_rows($result) > 0) {
	$row_count=mysqli_num_rows($result);
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo'<div class="col-lg-3 " id="rcorners3" >';
		echo'<div class="bg-primary text-right nested_div">';
		echo'<span class="position_text">';
		echo"<br>";
		$newDate = date("d D F", strtotime($row["date"]));
		echo $newDate;
		echo"</span>";
		echo'<span class="position_text">';
		echo"<br>";
		echo date("g:i a", strtotime($row["time"]));				echo'</span>';
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
		echo"</div>";
    }
	echo'</div>';

}
echo"</div>"
?>
</body>
</html>
