<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo '<link rel="stylesheet" type="text/css" href="style_spring.css">';

if($_POST){
$id_product = $_POST['product'];
$user = $_POST['user'];

$sql = "INSERT INTO wishlist (user_id, product_id) VALUES ('$user', '$id_product')";

   if ($conn->query($sql) === TRUE) {
        echo "Product added successfully to the wishlist";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo '<form method="post" action="">
 <label for="user">Choose a user:</label>
 <select name="user" id="user">';

while ($row = $result->fetch_assoc()) {
  echo '<option value="' . $row['id'] .'">' . $row['name'] .'</option>';
}

echo '</select>';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

echo '<label for="product">Choose a product:</label>
 <select name="product" id="product">';

while ($row = $result->fetch_assoc()) {
  echo '<option value="' . $row['id'] .'">' . $row['name'] .'</option>';
}

echo '</select>
  <input type="submit" value="Add to wishlist">
</form>';

$conn->close();
?>