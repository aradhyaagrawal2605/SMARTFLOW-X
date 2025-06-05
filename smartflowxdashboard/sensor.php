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
else {
	echo "Connection Success";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["temperature"]) && isset($_POST["humidity"])) {
    $temperature = $_POST["temperature"];
    $humidity = $_POST["humidity"];
    echo $temperature;
    echo $humidity;
    $sql = "INSERT INTO readings (temperature, humidity) VALUES ('$temperature', '$humidity')";
  } elseif (isset($_POST["heart_rate"])) {
    $heart_rate = $_POST["heart_rate"];
    $sql = "INSERT INTO heart_rate_readings (heart_rate) VALUES ('$heart_rate')";
  } elseif (isset($_POST["ph"])) {
    $ph = $_POST["ph"];
    $sql = "INSERT INTO ph_readings (ph) VALUES ('$ph')";
  }

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else {
  echo "failed";
}

$conn->close();
?>
