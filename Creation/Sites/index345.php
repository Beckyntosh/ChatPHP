<?php
// Create a connection to the database
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// If a specific order is requested, show its details. Otherwise, list all orders.
if (isset($_GET['order_id'])) {
  $order_id = $_GET['order_id'];
  $sql = "SELECT * FROM orders WHERE id = $order_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Order Details</h2>";
    echo "<p>Order ID: " . $row['id'] . "</p>";
    echo "<p>Customer Name: " . $row['customer_name'] . "</p>";
    echo "<p>Product Name: " . $row['product_name'] . "</p>";
    echo "<p>Quantity: " . $row['quantity'] . "</p>";
    echo "<p>Status: " . $row['status'] . "</p>";
    echo "<p>Total Price: " . $row['total_price'] . "</p>";
    echo "<a href='?'>Go back</a>";
  } else {
    echo "0 results";
  }
} else {
  $sql = "SELECT id, customer_name, product_name, quantity, status, total_price FROM orders";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<h2>Order History</h2>";
    echo "<table><tr><th>Order ID</th><th>Customer Name</th><th>Product Name</th><th>Quantity</th><th>Status</th><th>Total Price</th><th>Details</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["id"]."</td><td>".$row["customer_name"]."</td><td>".$row["product_name"]."</td><td>".$row["quantity"]."</td><td>".$row["status"]."</td><td>".$row["total_price"]."</td><td><a href='?order_id=".$row["id"]."'>View</a></td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
}

$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
<title>Order History</title>
<style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
    text-align: left;
  }
</style>
</head>
<body>

</body>
</html>