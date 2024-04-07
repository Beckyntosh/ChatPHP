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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $health_info = $_POST['health_info'];

    // Insert data
    $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);
    $stmt->execute();

    echo "New pet profile created successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
    <style>
        /* Cyperpunk style CSS adjustments */
        body {
            background-color: #0f0f23;
            color: #00ff41;
            font-family: 'Courier New', Courier, monospace;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #121212;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px #00ff41;
        }
        input[type=text], textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            background-color: #000;
            color: #00ff41;
            border: none;
        }
        input[type=submit] {
            background-color: #333;
            color: #00ff41;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Pet Profile</h2>
    <form action="" method="post">
        <label for="pet_name">Pet Name</label>
        <input type="text" id="pet_name" name="pet_name" required>

        <label for="pet_type">Pet Type</label>
        <input type="text" id="pet_type" name="pet_type" required>

        <label for="health_info">Health Info</label>
        <textarea id="health_info" name="health_info" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
