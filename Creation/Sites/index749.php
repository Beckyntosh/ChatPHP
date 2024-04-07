<?php
$servername = 'db';
$username = 'root';
$password = 'root';
$db = 'my_database';

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['userid']; // assuming the user is signed in and their id is stored in the session

$sql = "SELECT products.name, products.description, orders.quantity, orders.date 
        FROM users 
        INNER JOIN orders ON users.id = orders.user_id 
        INNER JOIN products ON products.id = orders.product_id 
        WHERE users.id = $userId ORDER BY orders.date DESC";

$result = $conn->query($sql);

echo "<html><head><style> body { background-image: url('bohemian-rhapsody-background.jpg'); font-family: 'Freddie Mercury Font'; color: gold; } </style></head><body>";

if ($result->num_rows > 0) {
    echo "<h1>Your Order History</h1>";
    
    while($row = $result->fetch_assoc()) {
        echo "<div style='border:1px solid gold; margin:10px; padding:10px;'>";
        echo "<h2>" . $row['name'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p>Quantity: " . $row['quantity'] . "</p>";
        echo "<p>Order Date: " . $row['date'] . "</p>";
        echo "</div>";
    }
} else {
    echo "You have no order history.";
}

echo "</body></html>";

$conn->close();
?>