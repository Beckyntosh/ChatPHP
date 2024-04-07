<?php
// DB Connection
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

// Create tables if not exist
$initSQL = [
    "CREATE TABLE IF NOT EXISTS products (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255),
      description TEXT,
      category VARCHAR(100),
      price DECIMAL(10, 2),
      stock_quantity INT
    );",
    "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
      ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
      ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
      ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
      ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
      ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
      ('Product F', 'Description of Product F', 'Category3', 69.99, 90);",
    "CREATE TABLE IF NOT EXISTS users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30),
      name VARCHAR(30),
      email VARCHAR(50),
      password VARCHAR(255)
    );",
    "INSERT INTO users (username, name, email, password) VALUES
      ('user1', 'User One', 'user1@example.com', 'password1'),
      ('user2', 'User Two', 'user2@example.com', 'password2'),
      ('user3', 'User Three', 'user3@example.com', 'password3');"
];

foreach ($initSQL as $sql) {
    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table or inserting data: " . $conn->error;
    }
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = intval($_POST['stock_quantity']);

    $sql = "INSERT INTO products (name, description, category, price, stock_quantity) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdi", $name, $description, $category, $price, $quantity);
    
    if ($stmt->execute()) {
        echo "<p>Product successfully added!</p>";
    } else {
        echo "<p>Error adding product: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      color: #333;
      text-align: center;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type=text], input[type=number], select {
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
    <h2>Add New Product</h2>
    <form action="" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="description">Description:</label>
      <input type="text" id="description" name="description" required>

      <label for="category">Category:</label>
      <select id="category" name="category">
        <option value="Category1">Category1</option>
        <option value="Category2">Category2</option>
        <option value="Category3">Category3</option>
      </select>

      <label for="price">Price:</label>
      <input type="number" step="0.01" id="price" name="price" required>

      <label for="stock_quantity">Stock Quantity:</label>
      <input type="number" id="stock_quantity" name="stock_quantity" required>

      <input type="submit" value="Add Product">
    </form>
  </div>
</body>
</html>