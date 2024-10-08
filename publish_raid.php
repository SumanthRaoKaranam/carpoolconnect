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

// Capture form data
$seats = $_POST['seats'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert into database
$sql = "INSERT INTO raids (seats, source, destination, email, phone) 
        VALUES ('$seats', '$source', '$destination', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Raid published successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
