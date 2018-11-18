<script type="text/javascript">
	function Ret(){
		window.location.href="page.html";
	}
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO bookings
VALUES(".$_GET["id"].",".$_GET["fr"].",".$_GET["td"].",".$_GET["n"].")";
if ($conn->query($sql) === TRUE) {
	echo '<link rel="stylesheet" href="main.css">';
    echo '<link rel="stylesheet" href="navigation.css">';
        echo '<script  src="navigation.js"></script>';
        echo '<div class="container" onclick="myFunction(this)">
              <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div>
            </div>
            <div id="myDropdown" style="visibility:hidden;" class="dropdown-content" >
                <a href="../../student/html/student.html">Home</a></br>
                <a href="../../EventCalendar/main.html">Calendar</a></br>
                <a href="../php/logout.php">Logout</a>
             
            </div>  ';
    echo '<div class="login" >';
    echo "<h1>Booking successful</h1><br>";
    echo '<button type="button" onclick="Ret()" class="btn btn-primary btn-block btn-large">Return to Booking Page</button><br>';
    echo "</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
