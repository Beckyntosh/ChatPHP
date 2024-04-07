<?php
// MYSQL credentials and connection setup
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

$connection = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if table `pet_profiles` exists, if not create it
$tableCheck = $connection->query("SHOW TABLES LIKE 'pet_profiles'");
if ($tableCheck->num_rows == 0) {
    $sql = "CREATE TABLE pet_profiles (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        pet_name VARCHAR(50) NOT NULL,
        pet_type VARCHAR(50) NOT NULL,
        health_info TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

    if ($connection->query($sql) !== TRUE) {
        die("Error creating table: " . $connection->error);
    }
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $health_info = $_POST['health_info'];

    $stmt = $connection->prepare("INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);

    if ($stmt->execute()) {
        echo "<p>Pet profile created successfully.</p>";
    } else {
        echo "<p>Sorry, there was an error creating your pet's profile.</p>";
    }

    $stmt->close();
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
</head>
<body>
    <h2>Create a Profile for Your Pet</h2>
    <form action="create_pet_profile.php" method="post">
        <p>
            <label for="pet_name">Pet Name:</label>
            <input type="text" name="pet_name" id="pet_name">
        </p>
        <p>
            <label for="pet_type">Pet Type:</label>
            <input type="text" name="pet_type" id="pet_type">
        </p>
        <p>
            <label for="health_info">Health Information:</label>
            <textarea name="health_info" id="health_info"></textarea>
        </p>
        <input type="submit" value="Create Profile">
    </form>
</body>
</html>
