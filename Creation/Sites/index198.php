<?php
// Connecting to database
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
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(255) NOT NULL,
    pet_type VARCHAR(100) NOT NULL,
    pet_breed VARCHAR(100),
    pet_age INT,
    health_info TEXT,
    dietary_info TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post variables
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $pet_breed = $_POST['pet_breed'];
    $pet_age = $_POST['pet_age'];
    $health_info = $_POST['health_info'];
    $dietary_info = $_POST['dietary_info'];

    $sql = "INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, pet_age, health_info, dietary_info)
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiss", $pet_name, $pet_type, $pet_breed, $pet_age, $health_info, $dietary_info);
    
    if ($stmt->execute()) {
        echo "New pet profile created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        body {font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 40px;}
        .container {background-color: #fff; padding: 20px; border-radius: 5px;}
        form input, form textarea {width: 100%; padding: 8px; margin: 10px 0;}
        form button {padding: 10px 20px;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Pet Profile</h2>
        <form method="post" action="">
            <label for="pet_name">Pet Name:</label>
            <input type="text" id="pet_name" name="pet_name" required>
            
            <label for="pet_type">Pet Type:</label>
            <input type="text" id="pet_type" name="pet_type" required>
            
            <label for="pet_breed">Pet Breed:</label>
            <input type="text" id="pet_breed" name="pet_breed">
            
            <label for="pet_age">Pet Age:</label>
            <input type="number" id="pet_age" name="pet_age">
            
            <label for="health_info">Health Information:</label>
            <textarea id="health_info" name="health_info"></textarea>
            
            <label for="dietary_info">Dietary Information:</label>
            <textarea id="dietary_info" name="dietary_info"></textarea>
            
            <button type="submit">Create Profile</button>
        </form>
    </div>
</body>
</html>