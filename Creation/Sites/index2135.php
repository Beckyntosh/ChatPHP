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

// Create table for shopping cart if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS shopping_carts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    product_data TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

$conn->query($createTable);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['saveCart'])) {
        // save cart scenario
        $userId = 1; // assuming a logged in user with id 1
        $productData = $conn->real_escape_string(json_encode($_POST['cartData']));
        
        $insertSql = "INSERT INTO shopping_carts (user_id, product_data) VALUES (?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("is", $userId, $productData);
        $stmt->execute();

        echo "Cart saved!";
    } else if (isset($_POST['getCart'])) {
        // retrieve cart scenario
        $userId = 1; // assuming a logged in user with id 1
        $selectSql = "SELECT product_data FROM shopping_carts WHERE user_id=? ORDER BY created_at DESC LIMIT 1";
        $stmt = $conn->prepare($selectSql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['product_data'];
        } else {
            echo "No saved cart found!";
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laptops Shopping Cart</title>
</head>
<body>
    <h2>Shopping Cart Example</h2>

    <div>
        <h3>Save Your Shopping Cart</h3>
        <form method="POST">
            <label for="cartData">Cart Data (JSON):</label><br>
            <textarea id="cartData" name="cartData" rows="4" cols="50"></textarea><br>
            <input type="submit" name="saveCart" value="Save Cart">
        </form>
    </div>
    <div style="margin-top: 20px;">
        <h3>Retrieve Your Shopping Cart</h3>
        <form method="POST">
            <input type="hidden" name="getCart" value="1">
            <input type="submit" value="Get Cart">
        </form>
    </div>
</body>
</html>
