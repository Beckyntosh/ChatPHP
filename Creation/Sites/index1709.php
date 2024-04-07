<?php

$host = "db";
$db_user = "root";
$db_password = "root";
$db_name = "my_database";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS pets (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        pet_name VARCHAR(30) NOT NULL,
        pet_type VARCHAR(30) NOT NULL,
        pet_breed VARCHAR(50),
        health_info TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $conn->exec($sql);
    echo "Table pets created successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST["pet_name"];
    $pet_type = $_POST["pet_type"];
    $pet_breed = $_POST["pet_breed"];
    $health_info = $_POST["health_info"];

    $sql = "INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES (?, ?, ?, ?)";
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$pet_name, $pet_type, $pet_breed, $health_info]);

        echo "New pet profile created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            padding: 20px;
        }
        h2 {
            color: #556b2f;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type=text], textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .container {
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Pet Profile</h2>
    <form method="POST" action="">
        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="pet_name" required>

        <label for="pet_type">Pet Type:</label>
        <input type="text" id="pet_type" name="pet_type" required>
        
        <label for="pet_breed">Pet Breed:</label>
        <input type="text" id="pet_breed" name="pet_breed">
        
        <label for="health_info">Health Info:</label>
        <textarea id="health_info" name="health_info" rows="4" required></textarea>
        
        <input type="submit" value="Create Profile">
    </form>
</div>

</body>
</html>
