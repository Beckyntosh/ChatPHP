<?php
// Database details
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establishing Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Creating table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(100)
    )";

if (!$conn->query($createTable)) {
  echo "Error creating table: " . $conn->error;
}

// Checking POST request to add a product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $description = htmlspecialchars($_POST["description"]);
  $price = htmlspecialchars($_POST["price"]);
  $image = htmlspecialchars($_POST["image"]); // Should be a path or URL

  $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssds", $name, $description, $price, $image);

  if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
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
    <title>Add Product - Comparison Tool</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
        }
        form {
            margin-top: 20px;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
        }
        input[type="submit"] {
            background: #333;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0779e4;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add Product to Comparison Tool</h1>
    </header>
    <div class="container">
        <form method="POST">
            <input type="text" name="name" placeholder="Product Name" required>
            <textarea name="description" placeholder="Product Description" required></textarea>
            <input type="text" name="price" placeholder="Price" required>
            <input type="text" name="image" placeholder="Image URL">
            <input type="submit" value="Add Product">
        </form>
    </div>
</body>
</html>
