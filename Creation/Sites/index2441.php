<?php
// This code is a simplified example and does not include sanitation or security measures such as prepared statements for SQL queries. Please ensure to add them in a production environment.

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

// Create table for Users if not exists
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
preferences VARCHAR(255),
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $preferences = implode(',', $_POST['preferences']);
    
    $sql = "INSERT INTO Users (username, email, preferences)
    VALUES ('$username', '$email', '$preferences')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register for Hair Care News</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #ddd; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2>Register for Customizable Hair Care News</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="preferences">Select your news preferences:</label>
        <select id="preferences" name="preferences[]" multiple>
            <option value="trends">Hair Trends</option>
            <option value="tips">Hair Care Tips</option>
            <option value="products">New Products</option>
            <option value="diy">DIY Recipes</option>
        </select>
        
        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>
