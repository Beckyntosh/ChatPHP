<?php
// Database connection
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

// Create Tables if they don't exist
$sql = file_get_contents('init.sql');
if (!$conn->multi_query($sql)) {
  echo "Error creating tables: " . $conn->error;
}

// Wait for multi_queries to finish
do {
  if ($res = $conn->store_result()) {
    $res->free();
  }
} while ($conn->more_results() && $conn->next_result());

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $stock_quantity = $_POST['stock_quantity'];

  $stmt = $conn->prepare("INSERT INTO products (name, description, category, price, stock_quantity) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssdi", $name, $description, $category, $price, $stock_quantity);

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog Upload - Toys Crowdfunding Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2e9;
            color: #515a5a;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #cacaca;
        }
        h2 {
            color: #4a752c;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #cccccc;
        }
        .form-group textarea {
            height: 100px;
        }
        .button {
            background-color: #4a752c;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #3a5a2c;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Product Catalog Upload Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="Category1">Category 1</option>
                <option value="Category2">Category 2</option>
                <option value="Category3">Category 3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="stock_quantity">Stock Quantity:</label>
            <input type="number" id="stock_quantity" name="stock_quantity" required>
        </div>
        <button type="submit" class="button">Upload Product</button>
    </form>
</div>

</body>
</html>