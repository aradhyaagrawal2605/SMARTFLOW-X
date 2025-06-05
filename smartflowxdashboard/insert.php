<?php
$host = "localhost";
$db = "smartflowxdatabase";
$user = "root";
$pass = "";
$conn = new mysqli($host, $user, $pass, $db);

$table = $_GET['table'];
if ($table == "ph_readings") {
  $ph = $_GET['ph'];
  $conn->query("INSERT INTO ph_readings (ph_value) VALUES ($ph)");
}
if ($table == "readings") {
  $temp = $_GET['temp'];
  $hum = $_GET['hum'];
  $conn->query("INSERT INTO readings (temperature, humidity) VALUES ($temp, $hum)");
}
echo "OK";
?>
