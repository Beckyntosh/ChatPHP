<?php

// DB config.
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'my_database';

// Create connection.
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the products table.
$conn->query("
CREATE TABLE IF NOT EXISTS products (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255),
 description TEXT,
 category VARCHAR(100),
 price DECIMAL(10, 2),
 stock_quantity INT
)");

// Insert sample products.
$conn->query("
INSERT INTO products (name, description, category, price, stock_quantity) VALUES 
('Product A', 'Description of Product A', 'Category1', 19.99, 100),
('Product B', 'Description of Product B', 'Category2', 29.99, 80),
('Product C', 'Description of Product C', 'Category1', 39.99, 150),
('Product D', 'Description of Product D', 'Category3', 49.99, 200),
('Product E', 'Description of Product E', 'Category2', 59.99, 60),
('Product F', 'Description of Product F', 'Category3', 69.99, 90)
 ");

// Create the users table.
$conn->query("
CREATE TABLE IF NOT EXISTS users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(30),
 name VARCHAR(30),
 email VARCHAR(50),
 password VARCHAR(255)
)");

// Insert sample users.
$conn->query("
INSERT INTO users (username, name, email, password) VALUES 
('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3')
");

// Add your web application code below to achieve the task you aim to.

?>
<!DOCTYPE html>
<html>
<head>
  <title>Vitamins Video Upload</title>
  <style>
    /* Add your Eco-Friendly Essence themed style here */
  </style>
</head>
<body>

File Upload Form
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <button type="submit" value="Upload Image" name="submit">
      Upload
    </button>
  </form>

</body>
</html>
<?php
$file_dir = "/path/to/your/upload/dir";

if(isset($_POST["submit"])) {
  $target_file = $file_dir . basename($_FILES["fileToUpload"]["name"]);
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
}
?>