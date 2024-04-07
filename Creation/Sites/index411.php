<?php
// Define variables for database connection
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

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $language = $conn->real_escape_string($_POST['language']);

    // SQL to create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS Users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            language VARCHAR(10),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

    if ($conn->query($sql) === TRUE) {
        // Insert user data
        $insert_sql = "INSERT INTO Users (username, email, language) VALUES ('$username', '$email', '$language')";
        if ($conn->query($insert_sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="language">Preferred Language:</label>
        <select id="language" name="language" required>
            <option value="English">English</option>
            <option value="French">French</option>
            <option value="Spanish">Spanish</option>
Add more languages here
        </select>
        
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>
