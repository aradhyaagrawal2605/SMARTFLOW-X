<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartflowxdatabase";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["message" => "DB connection failed"]);
    exit;
}

// Get all entries ordered by timestamp
$sql = "SELECT ph FROM ph_readings ORDER BY timestamp ASC";
$result = $conn->query($sql);

$data = [];
$volume = 1; // Starting volume in ml

while ($row = $result->fetch_assoc()) {
    $data[] = [
        "volume" => $volume,
        "pH" => floatval($row['ph'])
    ];
    $volume += 1; // Increase volume by 1ml every row
}

echo json_encode($data);
$conn->close();
?>
