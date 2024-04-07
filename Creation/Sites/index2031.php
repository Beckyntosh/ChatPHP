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

$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(100),
    REG_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Normally avoid echoing HTML or any characters if setting up tables
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $description = $_POST["description"];
  $image = $_POST["image"];

  $stmt = $conn->prepare("INSERT INTO products (name, description, image) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $description, $image);
  
  if($stmt->execute()) {
    echo "<p>Product added successfully!</p>";
  } else {
    echo "<p>Error adding product: ".$stmt->error."</p>";
  }
  
  $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product to Comparison Tool</title>
</head>
<body>
<div style="text-align:center;">
    <h2>Add Product</h2>
    <form action="" method="post">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>
        
        <label for="image">Image URL:</label><br>
        <input type="text" id="image" name="image"><br><br>
        
        <input type="submit" value="Add Product">
    </form>
</div>
</body>
</html>
