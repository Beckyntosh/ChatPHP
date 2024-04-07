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
$sql = "CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(50) NOT NULL,
custom_size VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_name = $_POST['product_name'];
  $custom_size = $_POST['custom_size'];

  $stmt = $conn->prepare("INSERT INTO orders (product_name, custom_size) VALUES (?, ?)");
  $stmt->bind_param("ss", $product_name, $custom_size);
  
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Order</title>
</head>
<body>

<h2>Add Product Order</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Product Name: <input type="text" name="product_name" required>
  <br><br>
  Custom Size: <input type="text" name="custom_size" required>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
