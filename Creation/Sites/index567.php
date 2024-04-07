<?php

$servername = "db";
$username   = "root";
$password   = "root";
$database   = "my_database";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Order History</title>
</head>
<body style="background-color: grey; font-family: 'Courier New', Courier, monospace;">
  <h1 style="color: white;">Order History</h1>

  <?php
  session_start();
  $user = $_SESSION['userid'];
  $sql = "SELECT * FROM orders WHERE user_id = $user";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      echo "<table style='color: white;'><tr><th>Product ID</th><th>Quantity</th></tr>";
      while($row = mysqli_fetch_assoc($result)) {
        $prod_id = $row['product_id'];
        $prod_sql = "SELECT * FROM products WHERE id = $prod_id";
        $prod_result = mysqli_query($conn, $prod_sql);
        $prod_row = mysqli_fetch_assoc($prod_result);
        echo "<tr><td>".$prod_row['name']."</td><td>".$row['quantity']."</td></tr>";
      }
      echo "</table>";
  } else {
      echo "You have no orders.";
  }
  mysqli_close($conn);
  ?>

</body>
</html>