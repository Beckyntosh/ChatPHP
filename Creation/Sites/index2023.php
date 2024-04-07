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

// Create product table if not exists
$productTable = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  image_url VARCHAR(255),
  category VARCHAR(255),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($productTable) === TRUE) {
  // echo "Table products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $image_url = $_POST['image_url'];
  $category = $_POST['category'];

  $sql = "INSERT INTO products (name, description, image_url, category)
  VALUES ('" . $name . "', '" . $description . "', '" . $image_url . "', '" . $category . "')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product to Comparison Tool</title>
<style>
body { font-family: Arial, sans-serif; }
</style>
</head>
<body>

<h2>Add Product</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  
  <label for="description">Description:</label><br>
  <textarea id="description" name="description" required></textarea><br>
  
  <label for="image_url">Image URL:</label><br>
  <input type="text" id="image_url" name="image_url" required><br>
  
  <label for="category">Category:</label><br>
  <input type="text" id="category" name="category" required><br>
  
  <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
