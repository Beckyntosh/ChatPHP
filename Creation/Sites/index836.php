<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['share'])){
  $user_id = $_POST['user_id'];
  $product_id = $_POST['product_id'];

  $query = "INSERT INTO shares (user_id, product_id) VALUES (?,?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ii", $user_id, $product_id);
  $stmt->execute();

  echo "Shared successfully!";
  $stmt->close();
  $conn->close();
}

?>
<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #89a7b6;
      color: #113f47;
    }
  </style>
</head>
<body>
<h2>Sharing Product</h2>

<form method="post" action="#">
  <label for="user_id">User ID:</label><br>
  <input type="text" id="user_id" name="user_id"><br>
  <label for="product_id">Product ID:</label><br>
  <input type="text" id="product_id" name="product_id"><br>
  <input type="submit" name="share" value="Share">
</form> 

</body>
</html>