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

// Creating tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  category VARCHAR(100),
  price DECIMAL(10, 2),
  stock_quantity INT
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product A', 'Description of Product A', 'Category1', 19.99, 100),
('Product B', 'Description of Product B', 'Category2', 29.99, 80),
('Product C', 'Description of Product C', 'Category1', 39.99, 150),
('Product D', 'Description of Product D', 'Category3', 49.99, 200),
('Product E', 'Description of Product E', 'Category2', 59.99, 60),
('Product F', 'Description of Product F', 'Category3', 69.99, 90);

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30),
  name VARCHAR(30),
  email VARCHAR(50),
  password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES
('user1', 'User One', 'user1@example.com', md5('password1')),
('user2', 'User Two', 'user2@example.com', md5('password2')),
('user3', 'User Three', 'user3@example.com', md5('password3'));";

if ($conn->multi_query($sql) === TRUE) {
  echo "Tables created and seeded successfully";
} else {
  echo "Error creating tables: " . $conn->error;
}

// Close initial connection
$conn->close();

// HTML and PHP mixed for demonstration
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Whimsical Wonderland Watches VR Showcase</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #F0E4D7;
            color: #F56991;
            text-align: center;
        }
        .container {
          padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome to our Whimsical Wonderland Watches VR Showcase</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST['username'];
        $pass = md5($_POST['password']); // Using md5 for demonstration, not secure for real applications
        
        // Re-create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $stmt->bind_param("ss", $uname, $pass);
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Login Success
            echo "<p>Login Successful. Welcome to the Whimsical Wonderland!</p>";
        } else {
            // Login Failed
            echo "<p>Login Failed. Please try again or contact support.</p>";
        }
        $stmt->close();
        $conn->close();
    } else {
        // Show Login Form
        echo '<form action="" method="post">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>';
    }
    ?>
</div>

</body>
</html>