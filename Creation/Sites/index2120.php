<?php
// Define database connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if the saveCart action is called
if (isset($_POST['action']) && $_POST['action'] == 'saveCart') {
    $userId = !empty($_POST['userId']) ? $_POST['userId'] : null;
    $cartData = !empty($_POST['cartData']) ? $_POST['cartData'] : '';

    // Save cart to database
    try {
        $sql = "REPLACE INTO carts (userId, cartData) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId, $cartData]);
        echo "Cart saved successfully.";
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

// Check if the getCart action is called
if (isset($_POST['action']) && $_POST['action'] == 'getCart') {
    $userId = !empty($_POST['userId']) ? $_POST['userId'] : null;

    // Retrieve cart from database
    try {
        $sql = "SELECT cartData FROM carts WHERE userId = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        echo $row ? $row['cartData'] : '';
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bicycles Shop</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 20px auto; }
        button { padding: 10px; margin: 5px; }
    </style>
    <script>
    function saveCart() {
        var userId = document.getElementById('userId').value;
        var cartData = JSON.stringify({items: [{productId: 1, quantity: 2}]}); // Example cart data

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            alert(this.responseText);
        }
        xhr.send("action=saveCart&userId=" + userId + "&cartData=" + encodeURIComponent(cartData));
    }

    function getCart() {
        var userId = document.getElementById('userId').value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            console.log(this.responseText);
            // Here you could parse the response and update the cart UI accordingly
        }
        xhr.send("action=getCart&userId=" + userId);
    }
    </script>
</head>
<body>
    <div class="container">
        <input type="text" id="userId" placeholder="User ID" />
        <button onclick="saveCart()">Save Cart</button>
        <button onclick="getCart()">Retrieve Cart</button>
    </div>
</body>
</html>

<?php
// Close the database connection
$pdo = null;
?>
