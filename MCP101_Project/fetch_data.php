<?php
header('Content-Type: application/json');

// Database Credentials
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "smartflowxdatabase";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Get table name dynamically (Passed from URL)
$table_name = file_get_contents("table_name.txt");
if (!$table_name) {
    die(json_encode(["error" => "Table name is required"]));
}

// Fetch last 20 temperature records
$sql = "SELECT temperature, timestamp FROM `$table_name` ORDER BY timestamp DESC LIMIT 20";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "temp" => (float) $row["temperature"],
        "time" => strtotime($row["timestamp"]) * 1000 // Convert to JS timestamp
    ];
}

// Reverse to maintain proper order for D3.js
echo json_encode(array_reverse($data));

$conn->close();
?>
