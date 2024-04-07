<?php
// Connection vars
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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(30) NOT NULL,
  quantity INT(3) NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  status VARCHAR(10) NOT NULL
  )";

if ($conn->query($sql) === TRUE) {
  echo ""; // Created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Frontend: HTML and PHP mixed
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<title>Order History</title>
</head>
<body>
<div class="container mt-5">
<h2>Your Order History</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Order Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT id, product_name, quantity, order_date, status FROM Orders ORDER BY order_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["product_name"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["order_date"]. "</td><td>" . $row["status"]. "</td></tr>";
      }
    } else {
      echo "<td colspan='5'>No orders found</td>";
    }
    $conn->close();
    ?>
  </tbody>
</table>
</div>
</body>
</html>