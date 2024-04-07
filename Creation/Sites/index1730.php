<?php
// Connection parameters
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
$table_sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(50) NOT NULL,
    pet_type VARCHAR(50) NOT NULL,
    pet_breed VARCHAR(50),
    health_info TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql)) {
    die("Error creating table: " . $conn->error);
}

// Handle post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $pet_breed = $_POST['pet_breed'];
    $health_info = $_POST['health_info'];

    $insert_sql = "INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ssss", $pet_name, $pet_type, $pet_breed, $health_info);

    if ($stmt->execute()) {
        echo "<p>Profile for " . htmlspecialchars($pet_name) . " created successfully.</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Pet Profile</h2>
        <form method="post" action="">
            <label for="pet_name">Pet Name:</label>
            <input type="text" name="pet_name" required>
            
            <label for="pet_type">Pet Type (e.g., Dog, Cat):</label>
            <input type="text" name="pet_type" required>
            
            <label for="pet_breed">Pet Breed:</label>
            <input type="text" name="pet_breed">
            
            <label for="health_info">Health Info:</label>
            <textarea name="health_info"></textarea>
            
            <input type="submit" value="Create Profile">
        </form>
    </div>
</body>
</html>
