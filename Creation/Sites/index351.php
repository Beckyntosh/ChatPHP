<?php
// Connect to Database
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

// Create Cart Table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS shopping_cart (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    product_id INT(6) NOT NULL,
    quantity INT(6) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTable) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Save Cart Functionality
if(isset($_POST['saveCart']) && !empty($_POST['userId'])){
    $userId = $_POST['userId'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    $saveCartSql = "INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('$userId', '$productId', '$quantity')";
    if ($conn->query($saveCartSql) === TRUE) {
        echo "Cart saved successfully";
    } else {
        echo "Error: " . $saveCartSql . "<br>" . $conn->error;
    }
}

// Retrieve Cart Functionality
if(isset($_POST['retrieveCart']) && !empty($_POST['userId'])){
    $userId = $_POST['userId'];
    $retrieveCartSql = "SELECT * FROM shopping_cart WHERE user_id='$userId'";
    $result = $conn->query($retrieveCartSql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>User ID</th><th>Product ID</th><th>Quantity</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["user_id"]."</td><td>".$row["product_id"]."</td><td>".$row["quantity"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Save Shopping Cart</h2>

<form method="post">
  User ID:<br>
  <input type="text" name="userId" required>
  <br>
  Product ID:<br>
  <input type="text" name="productId" required>
  <br>
  Quantity:<br>
  <input type="text" name="quantity" required>
  <br><br>
  <input type="submit" name="saveCart" value="Save Cart">
</form> 

<h2>Retrieve Shopping Cart</h2>

<form method="post">
  User ID:<br>
  <input type="text" name="userId" required>
  <br><br>
  <input type="submit" name="retrieveCart" value="Retrieve Cart">
</form> 

</body>
</html>