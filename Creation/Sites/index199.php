<?php
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

// SQL to create table
$pet_profile_table = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
dietary_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($pet_profile_table) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST["pet_name"];
    $pet_type = $_POST["pet_type"];
    $health_info = $_POST["health_info"];
    $dietary_info = $_POST["dietary_info"];

    $sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info, dietary_info)
    VALUES ('$pet_name', '$pet_type', '$health_info', '$dietary_info')";

    if ($conn->query($sql) === TRUE) {
        echo "New pet profile created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="pet_name" required><br><br>
        <label for="pet_type">Pet Type:</label>
        <input type="text" id="pet_type" name="pet_type" required><br><br>
        <label for="health_info">Health Information:</label>
        <textarea id="health_info" name="health_info" required></textarea><br><br>
        <label for="dietary_info">Dietary Information:</label>
        <textarea id="dietary_info" name="dietary_info" required></textarea><br><br>
        <input type="submit" value="Create Pet Profile">
    </form>
</body>
</html>