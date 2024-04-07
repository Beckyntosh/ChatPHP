<?php

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Creating tables if not exists
try {
    $sql = "CREATE TABLE IF NOT EXISTS carts (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        session_id VARCHAR(255) NOT NULL,
        data TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    exit;
}

// Save or update cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveCart'])) {
    $session_id = session_id();
    $data = json_encode($_POST['cartItems']);

    try {
        $checkQuery = $conn->prepare("SELECT * FROM carts WHERE session_id = ?");
        $checkQuery->execute([$session_id]);

        if ($checkQuery->rowCount() > 0) {
            // Update
            $updateQuery = $conn->prepare("UPDATE carts SET data = ? WHERE session_id = ?");
            $updateQuery->execute([$data, $session_id]);
        } else {
            // Insert
            $insertQuery = $conn->prepare("INSERT INTO carts (session_id, data) VALUES (?, ?)");
            $insertQuery->execute([$session_id, $data]);
        }
        echo "Cart saved successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}

// Retrieve cart
$cartData = [];
if (session_id()) {
    try {
        $retrieveQuery = $conn->prepare("SELECT data FROM carts WHERE session_id = ?");
        $retrieveQuery->execute([session_id()]);

        if ($retrieveQuery->rowCount() > 0) {
            $result = $retrieveQuery->fetch();
            $cartData = json_decode($result['data'], true);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
</head>
<body>

<h2>My Shopping Cart</h2>
<form method="post">
    <textarea name="cartItems" rows="5" cols="50"><?= htmlspecialchars(json_encode($cartData)) ?></textarea>
    <br>
    <button type="submit" name="saveCart">Save Cart</button>
</form>

<script>
    // Assuming a more complex interaction with the cart in a real application
</script>

</body>
</html>
