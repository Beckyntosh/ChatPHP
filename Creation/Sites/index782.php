<?php

// Define database parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database 
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){ die("ERROR: Could not connect. " . $conn->connect_error); }

// Initialize message variable
$message = "";

// Fetch products
$query = "SELECT * FROM products";
$products = mysqli_query($conn, $query);

// Manage wishlist
if (isset($_POST['add_to_wishlist'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];

    $sql = "INSERT INTO wishlist (user_id, product_id) VALUES ('$user_id', '$product_id')";
    mysqli_query($conn, $sql);
    $message = "Added to wishlist!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medicine Learning Platform</title>
    <style>
        /* Add your generic quaint quarters themed CSS styling here */
    </style>
</head>

<body>
    <h2>Medicines</h2>

    <?php echo $message; ?>

    <?php while ($row = mysqli_fetch_array($products)) { ?>
        
        <div class="product">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo $row['description']; ?></p>
            <form method="POST" action="wishlist.php">
                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="add_to_wishlist">Add to wishlist</button>
            </form>
        </div>

    <?php } ?>

</body>

</html>