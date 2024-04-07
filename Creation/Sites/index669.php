<?php
//Define your server, username, password and database
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

// Fetch products
$sql = "SELECT id, product_name FROM products";
$result = $conn->query($sql);
$products = [];
while($row = $result->fetch_assoc()) {
    $products[$row['id']] = $row['product_name'];
}

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_POST["user_id"];
  $product_id = $_POST["product_id"];
  
  $sql = "INSERT INTO users (user_id, product_id)
  VALUES ('$user_id', '$product_id')";

  if ($conn->query($sql) === TRUE) {
    echo "Your custom product saved successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Custom Product Builder</title>
  <style>
    /*Quick Art Deco CSS Style for demo*/
    body{
      background: #D7C6E6;
      font-family: 'Goudy Bookletter 1911', sans-serif;
  }
  </style>
</head>
<body>

<h2>Build Your Custom Product</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  User ID: <input type="text" name="user_id"><br>
  
  Products: 
  <select name="product_id">
    <?php foreach($products as $key => $value) { echo "<option value=\"$key\">$value</option>"; } ?>
  </select><br>
  
  <input type="submit">
</form>

</body>
</html>