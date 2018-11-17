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
    echo "Booking successful<br>";
    echo '<button type="button" onclick="Ret()">Return to Booking Page</button><br>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
