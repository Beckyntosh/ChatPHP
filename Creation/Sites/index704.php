<?php

// Define database connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link->connect_error) {
    die("ERROR: Could not connect. " . $link->connect_error);
}

// Create wishlist table if not exists
$wishlistTableSql = "CREATE TABLE IF NOT EXISTS wishlists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);";
if(!$link->query($wishlistTableSql)) {
    die("ERROR: Could not able to execute $wishlistTableSql. " . $link->error);
}

// Handle post request for adding to wishlist
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"]) && isset($_POST["user_id"])) {
    $product_id = $link->real_escape_string($_POST["product_id"]);
    $user_id = $link->real_escape_string($_POST["user_id"]);
    
    $insertSql = "INSERT INTO wishlists (user_id, product_id) VALUES ('$user_id', '$product_id')";
    
    if($link->query($insertSql)){
        echo "<script>alert('Product added to wishlist successfully.');</script>";
    } else{
        echo "<script>alert('ERROR: Could not able to execute $insertSql. " . $link->error ."');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skateboards Matchmaking Wishlist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #000;
            color: #0f0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header{
            background: #333;
            color: #0f0;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header a{
            color: #0f0;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        .add-to-wishlist-form {
            margin-top: 20px;
        }
        .add-to-wishlist-form input[type="submit"] {
            background: #333;
            color: #0f0;
            border: none;
            padding: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Skateboards Online Dating and Matchmaking Service - Wishlist</h1>
        </div>
    </header>
    <div class="container">
        <form class="add-to-wishlist-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id">
            <label for="product_id">Product ID:</label>
            <input type="text" id="product_id" name="product_id">
            <input type="submit" value="Add to Wishlist">
        </form>
    </div>
</body>
</html>
<?php $link->close(); ?>