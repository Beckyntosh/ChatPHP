<?php
// Connection parameters
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

// Create table for shopping carts if it does not exist
$cartTable = "CREATE TABLE IF NOT EXISTS shopping_cart (
    cart_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    product_data TEXT,
    saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($cartTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    saveCart($conn);
} else {
    retrieveCart($conn);
}

function saveCart($conn) {
    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);
    $productData = mysqli_real_escape_string($conn, json_encode($_POST['product_data']));
    
    $sql = "INSERT INTO shopping_cart (user_id, product_data) VALUES ('$userId', '$productData')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function retrieveCart($conn) {
    $userId = mysqli_real_escape_string($conn, $_GET['user_id']);
    $sql = "SELECT product_data FROM shopping_cart WHERE user_id = '$userId' ORDER BY saved_at DESC LIMIT 1";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Product Data: " . $row["product_data"];
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vinyl Records Shopping Cart</title>
</head>
<body>
    <h1>Save your cart</h1>
    <form method="post">
        User ID:<br>
        <input type="text" name="user_id">
        <br>
        Product Data (JSON format):<br>
        <textarea name="product_data"></textarea>
        <br><br>
        <input type="submit" value="Save Cart">
    </form>

    <h1>Retrieve your cart</h1>
    <form method="get">
        User ID:<br>
        <input type="text" name="user_id">
        <br><br>
        <input type="submit" value="Retrieve Cart">
    </form>
</body>
</html>
