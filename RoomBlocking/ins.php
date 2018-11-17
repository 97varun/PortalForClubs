<script type="text/javascript">
	function Ret(){
		window.location.href="page.html";
	}
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "room_blocking";
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
    echo '<body class="login">';
    echo "<h1>Booking successful</h1><br>";
    echo '<button type="button" onclick="Ret()" class="btn btn-primary btn-block btn-large">Return to Booking Page</button><br>';
    echo "</body>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
