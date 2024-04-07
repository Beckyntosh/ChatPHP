<?php
// Connection to the database
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

// Create Orders Table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_name VARCHAR(50) NOT NULL,
    quantity INT(3) NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    order_status VARCHAR(20) NOT NULL,
    order_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Orders created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order History</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<h2>Order History</h2>
<table>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Status</th>
        <th>Order Date</th>
    </tr>
    <?php
    $userId = 1; // Assuming User ID is 1 for demonstration purposes
    $query = "SELECT product_name, quantity, total_price, order_status, order_date FROM orders WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["product_name"] . "</td>
                    <td>" . $row["quantity"] . "</td>
                    <td>$" . $row["total_price"] . "</td>
                    <td>" . $row["order_status"] . "</td>
                    <td>" . $row["order_date"] . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No orders found</td></tr>";
    }
    $conn->close();
    ?>
</table>
</body>
</html>
