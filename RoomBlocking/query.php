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
	function Ret(){
		window.location.href="page.html";
	}
</script>
<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$Frd=$_POST["Dp"];
$Frd = date('Y-m-d', strtotime(str_replace('-', '/', $Frd)));
$Td=$_POST["Dp1"];
$Td = date('Y-m-d', strtotime(str_replace('-', '/', $Td)));
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql ="SELECT RoomId FROM rooms r WHERE NOT EXISTS (SELECT * FROM bookings b WHERE r.roomid = b.roomid AND (".'\''.$Frd.'\''." BETWEEN b.from_d AND b.to_d OR ".'\''.$Td.'\''." BETWEEN b.from_d AND b.to_d))";
//echo $sql;
$result = $conn->query($sql);
echo '<link rel="stylesheet" href="navigation.css">';
echo '<script  src="navigation.js"></script>';
echo '<script  src="box.js"></script>';
echo '<div class="container" onclick="myFunction(this)">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </div>
    <div id="myDropdown" style="visibility:hidden;" class="dropdown-content" >
        <a href="../../student/html/student.html">Home</a></br>
        <a href="../../EventCalendar/main.html">Calendar</a></br>
        <a href="../php/logout.php">Logout</a>
     
    </div> ';
echo '<link rel="stylesheet" href="main.css">';
echo '<link rel="stylesheet" href="box.css">';

if ($result->num_rows > 0) {
	
    echo '<body>';
    echo '<ul class="rolldown-list" id="myList">';
    while($row = $result->fetch_assoc()) {
    	echo'<li>';
        echo "<h2>Room: " . $row["RoomId"]." Available </h2><br>";
        echo '<button type="button" id='.$row["RoomId"].' class="btn " onclick="Sub(event)">Book!</button><br>';
        echo'</li>';
        
    }
    echo"</ul>";
    echo '</body>';
    $sql1="SELECT Club_name FROM club where Club_ID=(SELECT Club_ID from admin where Admin_USN="."'".$_SESSION['srn']."'".")";
    $result1= $conn->query($sql1);
    if ($result1->num_rows > 0) {
    	while($row = $result1->fetch_assoc()) {
    		$En=$row["Club_name"];
    	}
	}
	else{
		echo "Query failed";
	}
    //echo $En;
    echo '<div id="From" style="display : none">'.'\''.$Frd.'\''.' </div>';
    echo '<div id="To" style="display : none">'.'\''.$Td.'\''.' </div>';
    echo '<div id="Name" style="display : none">'.'\''.$En.'\''.' </div>';
} 
else {
	echo '<link rel="stylesheet" href="main.css">';
    echo '<body class="login">';
    echo "<script>alert('No Results')</script><br>";
    echo '<button type="button" onclick="Ret()">Return to Booking Page</button><br>';
    echo "</body>";
}
$conn->close();
?>
