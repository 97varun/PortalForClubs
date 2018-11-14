<script type="text/javascript">
	function Sub(e){
		var r=e.target.id;
		var fe=document.getElementById("From");
		var f=fe.innerHTML;
		var te=document.getElementById("To");
		var t=te.innerHTML;
		var ne=document.getElementById("Name");
		var n=ne.innerHTML;
		window.location.href="ins.php?id="+r+"&fr="+f+"&td="+t+"&n="+n;
	}
</script>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "room_blocking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$name=$_POST["Name"];
$Frd=$_POST["Dp"];
$Frd = date('Y-m-d', strtotime(str_replace('-', '/', $Frd)));
$Td=$_POST["Dp1"];
$Td = date('Y-m-d', strtotime(str_replace('-', '/', $Td)));
$En=$_POST["Ename"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT DISTINCT RoomId FROM bookings WHERE ".'\''.$Frd.'\''." not in(From_D,To_d) AND ".'\''.$Td.'\''." not in(From_D,To_d)";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Room: " . $row["RoomId"]." Available <br>";
        echo '<button type="button" id='.$row["RoomId"].' onclick="Sub(event)">Book!</button><br>';
    }
    echo '<div id="From" style="display : none">'.'\''.$Frd.'\''.' </div>';
    echo '<div id="To" style="display : none">'.'\''.$Td.'\''.' </div>';
    echo '<div id="Name" style="display : none">'.'\''.$En.'\''.' </div>';
} 
else {
    echo "<script>alert('Invalid Input')</script>";
}
$conn->close();

?>
