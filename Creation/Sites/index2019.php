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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  image_url VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check for form submission
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name'])) {
    $productName = $_POST['product_name'];
    $productDescription = $_POST['product_description'];
    $productImageURL = $_POST['product_image_url'];

    $stmt = $conn->prepare("INSERT INTO products (name, description, image_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $productName, $productDescription, $productImageURL);
    
    if($stmt->execute()) {
        echo '<script>alert("Product added successfully!")</script>';
    } else {
        echo '<script>alert("Error adding product!")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Camera Comparison Tool</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: auto; padding: 20px; }
        form { margin-bottom: 20px; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
<div class="container">

    <h2>Add Product</h2>
    <form method="POST">
        <input type="text" name="product_name" placeholder="Product Name" required />
        <textarea name="product_description" placeholder="Product Description" required></textarea>
        <input type="text" name="product_image_url" placeholder="Product Image URL" required />
        <input type="submit" value="Add Product" />
    </form>

    <h2>Products</h2>
    <?php
    $sql = "SELECT id, name, description, image_url FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<div><img src='".$row["image_url"]."' alt='".$row["name"]."' style='height: 100px;'><h3>" . $row["name"]. "</h3><p>" . $row["description"]. "</p></div>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
</div>
</body>
</html>

Please note, the given code is for educational purposes and requires a functioning LAMP (Linux, Apache, MySQL, PHP) stack or similar environment for deployment. Ensure you've MySQL running with the specified user credentials and that the PHP environment is properly configured.