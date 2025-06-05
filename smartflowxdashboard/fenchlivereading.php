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

// Fetch latest readings
$sql1 = "SELECT temperature, humidity FROM readings ORDER BY id DESC LIMIT 1";
$sql2 = "SELECT heart_rate FROM heart_rate_readings ORDER BY id DESC LIMIT 1";
$sql3 = "SELECT ph FROM ph_readings ORDER BY id DESC LIMIT 1";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

if ($result1->num_rows > 0 && $result2->num_rows > 0 && $result3->num_rows > 0) {
  $row1 = $result1->fetch_assoc();
  $row2 = $result2->fetch_assoc();
  $row3 = $result3->fetch_assoc();
  
  $data = array(
    "temperature" => $row1["temperature"],
    "humidity" => $row1["humidity"],
    "heart_rate" => $row2["heart_rate"],
    "ph" => $row3["ph"]
  );
  echo json_encode($data);
} else {
  echo json_encode(array("message" => "No readings available."));
}

$conn->close();
?>
