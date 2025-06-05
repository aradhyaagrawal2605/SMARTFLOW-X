<?php
error_log("--- START OF REQUEST ---");
error_log("HTTP Method: " . $_SERVER["REQUEST_METHOD"]);
error_log("Entire _SERVER array: " . print_r($_SERVER, true));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acidVol = $_POST['acidVol'];
    error_log("Received POST data: " . print_r($_POST, true));
    echo json_encode([ "success" => true, "volume" => $acidVol ]);
} else {
    echo json_encode([ "success" => false, "message" => "Method Not Allowed", "method" => $_SERVER["REQUEST_METHOD"] ]);
}
error_log("--- END OF REQUEST ---");
?>