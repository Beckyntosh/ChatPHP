<?php

// Database connection
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
$table_sql = "CREATE TABLE IF NOT EXISTS custom_orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  product VARCHAR(50) NOT NULL,
  dimensions VARCHAR(50) NOT NULL,
  details TEXT NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  //echo "Table custom_orders created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customer_name = $_POST['customer_name'];
  $email = $_POST['email'];
  $product = $_POST['product'];
  $dimensions = $_POST['dimensions'];
  $details = $_POST['details'];

  $insert_sql = "INSERT INTO custom_orders (customer_name, email, product, dimensions, details)
  VALUES ('$customer_name', '$email', '$product', '$dimensions', '$details')";

  if ($conn->query($insert_sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Custom Product Order</title>
</head>
<body>

<h2>Custom Product Order Form</h2>

<form action="" method="post">
  <label for="customer_name">Name:</label><br>
  <input type="text" id="customer_name" name="customer_name" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="product">Product:</label><br>
  <input type="text" id="product" name="product" value="Wooden Dining Table" readonly><br>
  <label for="dimensions">Dimensions:</label><br>
  <input type="text" id="dimensions" name="dimensions" placeholder="E.g., 120x60x75 cm" required><br>
  <label for="details">Additional Details:</label><br>
  <textarea id="details" name="details" placeholder="Describe your custom requirements" required></textarea><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
