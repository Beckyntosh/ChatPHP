<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, description, category, price, stock_quantity FROM products";
$result = $conn->query($sql);

echo "<html><head><style>body{background-color:#f0eabd; color:#584b42; font-family: 'Courier New', Courier, monospace;}</style></head><body>";

if ($result->num_rows > 0) {
    echo "<h2>Search Deals and Coupons:</h2>";
    
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Description: " . $row["description"]. " - Category: " . $row["category"]. " - Price: " . $row["price"]. " - Stock Quantity: " . $row["stock_quantity"]. "<br>";
    }
} else {
    echo "0 results";
}

echo "<h2>Search Users:</h2>";

$sql = "SELECT id, username, name, email, password FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Username: " . $row["username"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. " - Password: " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

echo "</body></html>";
?>