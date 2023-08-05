<?php
$servername = "localhost";
$username = "admin";
$password = "TMRtmr2021!"; // Replace with the actual password for the 'admin' user
$dbname = "soss_knowledge_base";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
