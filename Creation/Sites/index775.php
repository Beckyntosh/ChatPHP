<?php
// Simple PHP script for a Musical Instruments Online Ticket Booking Web Application
// with a Celestial Charm Theme - Add Product Functionality

// MYSQL Connection Credentials
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MYSQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Product Table if not exists
$sqlCreateProducts = "CREATE TABLE IF NOT EXISTS products (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(255),
                        description TEXT,
                        category VARCHAR(100),
                        price DECIMAL(10, 2),
                        stock_quantity INT
                      )";
$conn->query($sqlCreateProducts);

// HTML for adding a product form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product - Celestial Charm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1a2035;
            color: #f4f6ff;
        }
        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #28345a;
            border-radius: 8px;
        }
        input, button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        input {
            background: #3a416f;
            color: #b9befa;
        }
        button {
            background: #4c52b5;
            color: #ffffff;
            cursor: pointer;
        }
        button:hover {
            background: #626cd4;
        }
    </style>
</head>
<body>

<form action="" method="post">
    <h2>Add a New Product</h2>
    <input type="text" name="name" placeholder="Product Name" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="text" name="category" placeholder="Category" required>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <input type="number" name="stock_quantity" placeholder="Stock Quantity" required>
    <button type="submit" name="submit">Add Product</button>
</form>

<?php
// PHP code to process the form data and add it to the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $category = $conn->real_escape_string($_POST['category']);
    $price = floatval($_POST['price']);
    $stock_quantity = intval($_POST['stock_quantity']);

    $sqlInsertProduct = "INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('$name', '$description', '$category', '$price', '$stock_quantity')";

    if ($conn->query($sqlInsertProduct) === TRUE) {
        echo "<p>Product added successfully!</p>";
    } else {
        echo "<p>Error adding product: " . $conn->error . "</p>";
    }
}
?>

</body>
</html>
<?php
$conn->close();
?>