<?php
header('Content-Type: application/json');

// Database credentials
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "smartflowxdatabase";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Generate unique table name based on timestamp
$table_name = "temperature_" . time();
file_put_contents("table_name.txt", $table_name); // Store table name in a file

// Create table query
$sql = "CREATE TABLE $table_name (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    temperature FLOAT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "table_name" => $table_name]);
} else {
    echo json_encode(["error" => "Error creating table: " . $conn->error]);
}

$conn->close();
?>
