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

// Create table for users
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($userTableSql) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create table for browsing history
$historyTableSql = "CREATE TABLE IF NOT EXISTS browsing_history (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
product_id INT(6) UNSIGNED,
view_date TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($historyTableSql) === TRUE) {
  echo "Table browsing_history created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create table for products
$productTableSql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
style VARCHAR(50) NOT NULL,
description TEXT,
price DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($productTableSql) === TRUE) {
  echo "Table products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modular Handbags - Personalized Recommendations</title>
<style>
  body { font-family: Arial, sans-serif; }
  .product { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
</style>
</head>
<body>

<h2>Recommended Handbags for You</h2>

<?php
$userId = 1; // Example user ID

// Fetch recommended products based on user's browsing history
$recommendationSql = "SELECT p.* FROM products p
JOIN browsing_history bh ON p.id = bh.product_id
WHERE bh.user_id = $userId AND p.style = 'modular'
GROUP BY p.id
ORDER BY COUNT(bh.id) DESC
LIMIT 5";

$result = $conn->query($recommendationSql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div class='product'><h3>" . $row["name"]. "</h3><p>" . $row["description"]. "</p><p>Style: " . $row["style"] . "</p><p>Price: $" . $row["price"]. "</p></div>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>
