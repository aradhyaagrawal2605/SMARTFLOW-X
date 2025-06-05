<?php
include 'create_table.php';
$servername = "localhost";
$username = "root";  // Default XAMPP MySQL username
$password = "";      // Default password is empty
$dbname = "smartflowxdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if temperature and humidity values are received
// if (isset($_GET['temperature']) && isset($_GET['humidity'])) {
//     $temperature = $_GET['temperature'];
//     $humidity = $_GET['humidity'];

// For now enter random values
    $current_table=file_get_contents("table_name.txt"); // Retrieve stored table name
    // Insert data into database
    function randomFloat($min, $max) {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }
    $startTime = microtime(true); // Get current time in seconds with microsecond precision
    while ((microtime(true) - $startTime) < 10) {
        $temperature=number_format(randomFloat(10.5, 20.5), 1);
        $sql = "INSERT INTO $current_table (temperature) VALUES ('$temperature')";
        usleep(500000); // Sleep for 0.5 seconds (500,000 microseconds)
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    }
// } else {
//     echo "No data received";
// }

$conn->close();
?>
