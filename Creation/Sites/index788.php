<?php
// Database Credentials
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create orders table if not exists
$ordersTableSQL = "CREATE TABLE IF NOT EXISTS orders (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
product_id INT,
order_status VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (product_id) REFERENCES products(id)
)";
if (!$conn->query($ordersTableSQL) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// HTML for styling and a simple order tracking form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sunglasses Carrier Order Tracking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4d03f; /* Summer themed background color */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0e68c; /* Light summer color */
            border-radius: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], button {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Track Your Order</h2>
        <form action="index.php" method="post">
            <label for="orderId">Order ID:</label>
            <input type="text" id="orderId" name="orderId" required>
            <button type="submit" name="trackOrder">Track Order</button>
        </form>
        <?php
        if (isset($_POST['trackOrder'])) {
            $orderId = $conn->real_escape_string($_POST['orderId']);
            $query = "SELECT orders.id, orders.order_status, products.name 
                      FROM orders 
                      JOIN products ON orders.product_id = products.id
                      WHERE orders.id = '$orderId'";

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>Order ID: " . $row["id"] . " - Product Name: " . $row["name"] . " - Status: " . $row["order_status"] . "</p>";
                }
            } else {
                echo "<p>Order not found. Please check the Order ID and try again.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>