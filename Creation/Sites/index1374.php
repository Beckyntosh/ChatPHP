<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $product_name = $_POST['product_name'];
    $dimensions = $_POST['dimensions'];
    $quantity = $_POST['quantity'];

    // Attempt insert query execution
    $sql = "INSERT INTO orders (product_name, dimensions, quantity) VALUES ('$product_name', '$dimensions', '$quantity')";

    if (mysqli_query($conn, $sql)) {
        echo "Order placed successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add an Order</title>
</head>
<body>

<h2>Order Custom-Sized Baby Products</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="product_name">Product Name:</label><br>
    <input type="text" id="product_name" name="product_name" value="Wooden Dining Table"><br>
    
    <label for="dimensions">Dimensions:</label><br>
    <input type="text" id="dimensions" name="dimensions" placeholder="Example: 120x60x75cm"><br>
    
    <label for="quantity">Quantity:</label><br>
    <input type="number" id="quantity" name="quantity" value="1"><br><br>
    
    <input type="submit" value="Place Order">
</form>

</body>
</html>
<?php
// Create table if it doesn't exist
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(30) NOT NULL,
dimensions VARCHAR(30) NOT NULL,
quantity INT(3) NOT NULL,
reg_date TIMESTAMP
)";

if ($connection->query($sql) === TRUE) {
    // echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}

$connection->close();
?>
