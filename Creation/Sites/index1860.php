<?php
    /* 
    Disclaimer: This sample code is designed for educational purposes and is not suitable 
    for production as-is due to the lack of security measures like input validation, 
    sanitization, and lack of user authentication/authorization.

    Shopping Cart Saving and Retrieval: Example for an Office Supplies Website in an Alan Turing Style
    */

    // Database Configuration
    define('DB_SERVER', 'db');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'my_database');

    // Establishing Connection
    try {
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    // Create Tables if they do not exist
    try {
        $createUsersTableQuery = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE
        )";
        
        $createCartsTableQuery = "CREATE TABLE IF NOT EXISTS carts (
            cart_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            cart_contents TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";
        
        $pdo->exec($createUsersTableQuery);
        $pdo->exec($createCartsTableQuery);
    } catch(PDOException $e) {
        die("ERROR: Could not able to execute $createUsersTableQuery. " . $e->getMessage());
    }

    // Helper function to save the cart
    function saveCart($pdo, $userId, $cartContents) {
        try {
            $sql = "INSERT INTO carts (user_id, cart_contents) VALUES (:user_id, :cart_contents)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':cart_contents', $cartContents, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    // Helper function to retrieve the cart
    function retrieveCart($pdo, $userId) {
        try {
            $sql = "SELECT cart_contents FROM carts WHERE user_id = :user_id ORDER BY created_at DESC LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? $row['cart_contents'] : null;
        } catch(PDOException $e) {
            return false;
        }
    }

    // HTML and PHP mixed for demonstrating Save and Retrieve functionality
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alan Turing Office Supplies - Cart</title>
    <style>
        body { font: 14px sans-serif; }
        .wrapper { width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Shopping Cart</h2>
        <?php
            // Assuming a user_id is available as a session variable or is predefined
            $userId = 1; // Example user_id
            $action = $_SERVER['REQUEST_METHOD'] == 'POST' ? trim($_POST['action']) : '';

            if($action == 'save') {
                // In real scenario, validate and sanitize these values
                $cartContents = serialize($_POST['cartContents']); // Simple serialization for demonstration

                if(saveCart($pdo, $userId, $cartContents)) {
                    echo "<p>Cart saved successfully.</p>";
                } else {
                    echo "<p>Failed to save the cart.</p>";
                }
            } elseif($action == 'retrieve') {
                $savedCart = retrieveCart($pdo, $userId);
                if($savedCart) {
                    echo "<p>Saved Cart Contents: " . htmlspecialchars($savedCart) . "</p>"; // Displaying for demonstration. Deserialization and proper handling is needed for real case.
                } else {
                    echo "<p>No saved cart found.</p>";
                }
            }
        ?>
        
        <form action="" method="post">
            <div>
                <label for="cartContents">Cart Contents:</label>
                <input type="text" name="cartContents" id="cartContents">
            </div>
            <br>
            <input type="submit" name="action" value="save">
            <input type="submit" name="action" value="retrieve">
        </form>
    </div>    
</body>
</html>
