<?php

// Connection to MySQL
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Table creation for cameras
$cameraTableSql = "CREATE TABLE IF NOT EXISTS cameras (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    camera_name VARCHAR(30) NOT NULL,
    location VARCHAR(30) NOT NULL,
    ip_address VARCHAR(15) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($cameraTableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $camera_name = $_POST["camera_name"];
    $location = $_POST["location"];
    $ip_address = $_POST["ip_address"];

    $stmt = $conn->prepare("INSERT INTO cameras (camera_name, location, ip_address) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $camera_name, $location, $ip_address);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Security Camera</title>
    <style>
        body{font-family: Arial, sans-serif; align-items: center; justify-content: center; display: flex; flex-direction: column;}
        input[type=text], input[type=password], input[type=submit] {padding: 10px; margin: 5px;}
    </style>
</head>
<body>

    <h2>Add Security Camera to Home Automation</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Camera Name:</label>
            <input type="text" name="camera_name" required>
        </div>
        <div>
            <label>Location:</label>
            <input type="text" name="location" required>
        </div>
        <div>
            <label>IP Address:</label>
            <input type="text" name="ip_address" required>
        </div>
        <div>
            <input type="submit" value="Add Camera">
        </div>
    </form>

</body>
</html>