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

// Check if table exists, if not, create it
$tableCheckQuery = "SHOW TABLES LIKE 'products_comparison'";
$result = $conn->query($tableCheckQuery);

if($result->num_rows == 0) {
    $createTable = "CREATE TABLE products_comparison (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($createTable) === TRUE) {
      echo "Table products_comparison created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
}

// Insert products if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productName = $_POST["productName"];
  $description = $_POST["description"];
  $category = $_POST["category"];

  $sql = "INSERT INTO products_comparison (product_name, description, category)
  VALUES ('$productName', '$description', '$category')";

  if ($conn->query($sql) === TRUE) {
    echo "New product added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    color: #333;
}
.container {
    max-width: 600px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

</style>
</head>
<body>

<div class="container">
<h2>Add Product to Comparison Tool</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="productName">Product Name:</label>
  <input type="text" id="productName" name="productName" required>

  <label for="description">Description:</label>
  <textarea id="description" name="description" required></textarea>

  <label for="category">Category:</label>
  <select id="category" name="category">
    <option value="fitness_equipment">Fitness Equipment</option>
  </select>

  <input type="submit" value="Add Product">
</form>
</div>

</body>
</html>

<?php
$conn->close();
?>
