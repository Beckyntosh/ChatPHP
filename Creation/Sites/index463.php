<?php
// Connection to database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data
    $timeToConvert = $_POST['timeToConvert'];
    $fromTimeZone = $_POST['fromTimeZone'];
    $toTimeZone = $_POST['toTimeZone'];

    // Convert time
    $date = new DateTime($timeToConvert, new DateTimeZone($fromTimeZone));
    $date->setTimezone(new DateTimeZone($toTimeZone));
    $convertedTime = $date->format('Y-m-d H:i:s');

    // Saving conversion result into the database
    $sql = "INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('$fromTimeZone', '$toTimeZone', '$timeToConvert', '$convertedTime')";

    if (!$conn->query($sql) === TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Time Zone Converter</title>
</head>
<body>
<h2>Convert time between different time zones</h2>

<form method="post">
    Time to Convert (in format 9:00 AM): <input type="text" name="timeToConvert" required><br>
    From Time Zone: <input type="text" name="fromTimeZone" required><br>
    To Time Zone: <input type="text" name="toTimeZone" required><br>
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h3>Converted Time: " . $convertedTime . "</h3>";
}
?>

</body>
</html>

<?php
$conn->close();
?>