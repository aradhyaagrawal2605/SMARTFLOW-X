<?php
$servername = "localhost";
$username = "root";      // Change if needed
$password = "";          // Change if needed
$dbname = "smartflowxdatabase";   // Change if your DB name is different

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["message" => "Connection failed"]);
    exit;
}

$sql = "DELETE FROM ph_readings";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Table cleared"]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Error clearing table"]);
}
$conn->close();
?>
