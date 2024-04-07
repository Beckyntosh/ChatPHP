<?php
// Connect to database
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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(255) NOT NULL,
customSize VARCHAR(255) NOT NULL,
orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table orders created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productName = $_POST['productName'];
  $customSize = $_POST['customSize'];

  $stmt = $conn->prepare("INSERT INTO orders (productName, customSize) VALUES (?, ?)");
  $stmt->bind_param("ss", $productName, $customSize);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add an Order</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
}

form {
  background-color: #fff;
  padding: 20px;
  margin: 50px auto;
  width: 300px;
  border-radius: 10px;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
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
</style>
</head>
<body>

<h2>Add Product Order</h2>

<form method="POST">
  <label for="productName">Product Name:</label>
  <input type="text" id="productName" name="productName" placeholder="e.g., Wooden Dining Table" required>

  <label for="customSize">Custom Size:</label>
  <input type="text" id="customSize" name="customSize" placeholder="e.g., 200x100x75cm" required>
  
  <input type="submit" value="Submit">
</form>

</body>
</html>
