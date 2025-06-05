<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartflowxdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT timestamp, heart_rate FROM heart_rate_readings ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = array('time' => $row["timestamp"], 'heartRate' => $row["heart_rate"]);
    }
    echo json_encode($data);
} else {
    echo "0 results";
}

$conn->close();
?>
