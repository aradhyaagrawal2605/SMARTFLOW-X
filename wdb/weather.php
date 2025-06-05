<?php
$insert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Temperature'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    $Temperature = $_POST['Temperature'];
    $Rainfall = $_POST['Rainfall'];
    $Humidity = $_POST['Humidity'];
    $sql = "INSERT INTO `weather`.`weather` (`Temperature`, `Rainfall`, `Humidity`) VALUES ('$Temperature', '$Rainfall', '$Humidity');";

    if ($con->query($sql) == true) {
        $insert = true;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit(); // Prevent further execution
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Database</title>
    <link rel="stylesheet" href="weather.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Suxma System Weather Database</h2>
        <p>Fill the form with the weather conditions</p>
        <?php
        if ($insert == true) {
            echo "<p>Form Submission Successful!</p>";
        }
        ?>
        <form action="weather.php" method="post">
            <h3>TEMPERATURE</h3>
            <input type="number" name="Temperature" id="Temperature" placeholder="Enter the temperature in &#176;C">
            <h3>RAINFALL</h3>
            <input type="number" name="Rainfall" id="Rainfall" placeholder="Enter the rainfall in mm">
            <h3>HUMIDITY</h3>
            <input type="number" name="Humidity" id="Humidity" placeholder="Enter the relative humidity (%)">
            <button type="submit" class="btn">SUBMIT</button>
            <button type="reset" class="btn">RESET</button>
        </form>
    </div>
    <script src="weather.js"></script>
</body>
</html>
