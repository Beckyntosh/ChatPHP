<?php
// Set database connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// If request is to save the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveCart'])) {
    $userID = mysqli_real_escape_string($conn, $_POST['userID']);
    $cartContents = mysqli_real_escape_string($conn, json_encode($_POST['cartItems'])); // cartItems should be an array of item IDs and quantities

    // Check if user already has a saved cart
    $checkQuery = "SELECT * FROM saved_carts WHERE user_id = '$userID'";
    $checkResult = mysqli_query($conn, $checkQuery);

    // If a cart exists, update it. Otherwise, insert a new cart
    if (mysqli_num_rows($checkResult) > 0) {
        $query = "UPDATE saved_carts SET cart_contents = '$cartContents' WHERE user_id = '$userID'";
    } else {
        $query = "INSERT INTO saved_carts (user_id, cart_contents) VALUES ('$userID', '$cartContents')";
    }

    if (mysqli_query($conn, $query)) {
        echo "Cart saved successfully.";
    } else {
        echo "ERROR: Could not save cart.";
    }
}

// If request is to retrieve the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['retrieveCart'])) {
    $userID = mysqli_real_escape_string($conn, $_POST['userID']);

    $query = "SELECT cart_contents FROM saved_carts WHERE user_id = '$userID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['cart_contents']; // This is the saved cart content in JSON format
    } else {
        echo "No saved cart found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart Save and Retrieve</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
Assume userID is 1 for this example
Example cart item
    <button type="submit" name="saveCart">Save Cart</button>
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
Again, assume userID is 1
    <button type="submit" name="retrieveCart">Retrieve Cart</button>
</form>
</body>
</html>
<?php
// Close connection
mysqli_close($conn);
?>
