<?php
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

// Create table for products
$productTableSql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($productTableSql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Create table for reviews
$reviewTableSql = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id INT(6) UNSIGNED NOT NULL,
rating INT NOT NULL,
comment TEXT,
reg_date TIMESTAMP,
FOREIGN KEY (product_id) REFERENCES products(id)
)";

if ($conn->query($reviewTableSql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Insert product POST Handler
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productName"])) {
    $stmt = $conn->prepare("INSERT INTO products (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST["productName"], $_POST["productDescription"]);
    $stmt->execute();
    $stmt->close();
}

// Insert review POST Handler
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reviewRating"])) {
    $stmt = $conn->prepare("INSERT INTO reviews (product_id, rating, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $_POST["productId"], $_POST["reviewRating"], $_POST["reviewComment"]);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Review System</title>
</head>
<body>

<h2>Add Product</h2>
<form method="post">
  Product Name: <input type="text" name="productName" required><br>
  Product Description: <textarea name="productDescription" required></textarea><br>
  <input type="submit" value="Add Product">
</form>

<hr>

<h2>Add Review</h2>
<form method="post">
  Product ID: <input type="number" name="productId" required><br>
  Rating: <select name="reviewRating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select><br>
  Comment: <textarea name="reviewComment"></textarea><br>
  <input type="submit" value="Add Review">
</form>

<hr>

<h2>Products and Reviews</h2>
<?php
$sql = "SELECT p.name, p.description, r.rating, r.comment FROM products p LEFT JOIN reviews r ON p.id = r.product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<p><strong>" . $row["name"]. "</strong> - " . $row["description"]. "<br> Rating: " . $row["rating"]. " - Comment: " . $row["comment"]. "</p>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>
