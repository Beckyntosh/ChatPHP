<?php
// Set up the database connection
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

// Create shopping_cart table if it doesn't exist
$cartTable = "CREATE TABLE IF NOT EXISTS shopping_cart (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  user_id INT(11) NOT NULL,
  product_details TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($cartTable);

$action = isset($_POST['action']) ? $_POST['action'] : "";

if ($action == 'saveCart') {
  // Assume user_id is fetched from session or similar
  $user_id = 1;
  $product_details = $conn->real_escape_string(json_encode($_POST['cartItems']));

  $saveQuery = "INSERT INTO shopping_cart (user_id, product_details) VALUES ('$user_id', '$product_details')";
  if ($conn->query($saveQuery) === TRUE) {
    echo "Cart saved successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} elseif ($action == 'loadCart') {
  $user_id = 1; // Assuming the user_id is fetched from session or similar
  $selectQuery = "SELECT product_details FROM shopping_cart WHERE user_id = '$user_id' ORDER BY created_at DESC LIMIT 1";
  $result = $conn->query($selectQuery);
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo $row["product_details"];
    }
  } else {
    echo "No saved cart found.";
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shoe Store - Shopping Cart</title>
</head>
<body>
  <div id="cart"></div>
  <button onclick="saveCart()">Save Cart</button>
  <button onclick="loadCart()">Load Cart</button>

<script>
let cartItems = [];

function saveCart() {
  const data = new FormData();
  data.append('action', 'saveCart');
  data.append('cartItems', JSON.stringify(cartItems));

  fetch('', {
    method: 'POST',
    body: data,
  })
  .then(response => response.text())
  .then(data => {
    console.log(data);
  });
}

function loadCart() {
  const data = new FormData();
  data.append('action', 'loadCart');

  fetch('', {
    method: 'POST',
    body: data,
  })
  .then(response => response.text())
  .then(data => {
    cartItems = JSON.parse(data);
    document.getElementById('cart').innerHTML = '<pre>' + JSON.stringify(cartItems, null, 2) + '</pre>';
  });
}
</script>
</body>
</html>
