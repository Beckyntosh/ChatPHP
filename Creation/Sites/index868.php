<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Error checking
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables and insert data
$sql = "
CREATE TABLE IF NOT EXISTS products (
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
('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3');
";
$result = $conn->multi_query($sql);


if(isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insert_query = "INSERT INTO users (username, name, email, password) VALUES ('user3', '$name', '$email', '$hashed_password')";
    $result = mysqli_query($conn, $insert_query);
    
    if($result) {
        echo "User registered successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: blue;
            color: white;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <form action="register.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br>
        <input type="submit" value="Register" name="submit">
    </form>
</body>
</html>
