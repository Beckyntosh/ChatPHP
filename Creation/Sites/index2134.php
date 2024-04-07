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

// Shopping Cart Table Creation Code
$createTableSQL = "CREATE TABLE IF NOT EXISTS shopping_cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_details TEXT,
  saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createTableSQL) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Save the shopping cart
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['saveCart'])) {
  $userId = $_POST['userId'];
  $productDetails = $conn->real_escape_string(json_encode($_POST['productDetails']));
  
  $insertSQL = "INSERT INTO shopping_cart (user_id, product_details)
                VALUES ('$userId', '$productDetails')";
  
  if ($conn->query($insertSQL) === TRUE) {
    echo "Shopping cart saved successfully";
  } else {
    echo "Error: " . $insertSQL . "<br>" . $conn->error;
  }
}

// Retrieve the shopping cart
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['retrieveCart'])) {
  $userId = $_POST['userId'];
  
  $selectSQL = "SELECT product_details FROM shopping_cart WHERE user_id = '$userId' ORDER BY saved_at DESC LIMIT 1";
  
  $result = $conn->query($selectSQL);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "Cart Details: " . $row["product_details"];
    }
  } else {
    echo "No saved carts found";
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Happy Jewelry Shopping Cart</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f0e4d7; color: #f76b8a; }
    .container { margin: 20px; }
    .btn { background-color: #f76b8a; color: white; padding: 10px; border: none; cursor: pointer; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Happy Jewelry Shopping Cart</h2>
    <form method="post">
      <input type="hidden" name="userId" value="1" />
      <label for="productDetails">Product Details (JSON):</label><br>
      <textarea name="productDetails" rows="5" cols="30">{"items":[{"id":"1","name":"Diamond Ring"}]}</textarea><br><br>
      <input type="submit" name="saveCart" value="Save Cart" class="btn" />
    </form>
    <br>
    <form method="post">
      <input type="hidden" name="userId" value="1" />
      <input type="submit" name="retrieveCart" value="Retrieve Cart" class="btn" />
    </form>
  </div>
</body>
</html>
