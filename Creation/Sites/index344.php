<?php
// Set up the connection parameters
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

// Create Orders and OrderDetails tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    status VARCHAR(30) NOT NULL
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS OrderDetails (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT(6) NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    quantity INT(3) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES Orders(id)
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Select orders from the database
$user_id = 1; // Example user id
$sql = "SELECT Orders.id, Orders.order_date, Orders.status, OrderDetails.product_name, OrderDetails.quantity, OrderDetails.price FROM Orders INNER JOIN OrderDetails ON Orders.id=OrderDetails.order_id WHERE Orders.user_id=$user_id ORDER BY Orders.order_date DESC";
$result = $conn->query($sql);

// HTML to display orders
echo "<!DOCTYPE html>
<html>
<head>
<title>Craft Beers Order History</title>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}

th, td {
  padding: 10px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
<h2>Your Order History</h2>
<table>
  <tr>
    <th>Order ID</th>
    <th>Date</th>
    <th>Status</th>
    <th>Product Name</th>
    <th>Quantity</th>
    <th>Price</th>
  </tr>";

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row["id"]."</td>
    <td>".$row["order_date"]."</td>
    <td>".$row["status"]."</td>
    <td>".$row["product_name"]."</td>
    <td>".$row["quantity"]."</td>
    <td>".$row["price"]."</td>
    </tr>";
  }
} else {
  echo "<tr><td colspan='6'>No orders found</td></tr>";
}
echo "</table>
</body>
</html>";

$conn->close();
?>