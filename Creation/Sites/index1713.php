<?php
// Handle POST request to create a new pet profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Creating a connection to MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $petName = $conn->real_escape_string($_POST['petName']);
    $petType = $conn->real_escape_string($_POST['petType']);
    $petAge = $conn->real_escape_string($_POST['petAge']);
    $healthInfo = $conn->real_escape_string($_POST['healthInfo']);

    $sql = "INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('$petName', '$petType', '$petAge', '$healthInfo')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
</head>
<body>

<h2>Create Pet Profile</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="petName">Pet Name:</label><br>
    <input type="text" id="petName" name="petName"><br>
    <label for="petType">Pet Type:</label><br>
    <input type="text" id="petType" name="petType"><br>
    <label for="petAge">Pet Age:</label><br>
    <input type="number" id="petAge" name="petAge"><br>
    <label for="healthInfo">Health Info:</label><br>
    <textarea id="healthInfo" name="healthInfo"></textarea><br>
    <input type="submit" value="Submit">
</form> 

<?php
// Database Creation and Table Setup
$conn = new mysqli("db", "root", "root", "");
$sql = "CREATE DATABASE IF NOT EXISTS my_database";
$conn->query($sql);

$conn->select_db('my_database');

$table = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    petType VARCHAR(30) NOT NULL,
    petAge INT(3),
    healthInfo TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$conn->query($table);
$conn->close();
?>

</body>
</html>
