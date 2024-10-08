<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hitchedwheels";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get source and destination from query parameters
$source = $_GET['source'];
$destination = $_GET['destination'];

// Fetch matching raids
$sql = "SELECT seats, email, phone FROM raids WHERE source='$source' AND destination='$destination'";
$result = $conn->query($sql);

$raids = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $raids[] = $row;
    }
}

// Return the results as JSON
echo json_encode($raids);

$conn->close();
?>
