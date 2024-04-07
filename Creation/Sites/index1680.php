<?php
// Connection variables
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

// Create products table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(50) NOT NULL,
    brand VARCHAR(30),
    price DECIMAL(10, 2),
    description TEXT,
    imageURL VARCHAR(100),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Form handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addProduct'])) {
    $productName = $_POST['productName'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $imageURL = $_POST['imageURL'];

    $insertSql = "INSERT INTO products (productName, brand, price, description, imageURL) 
                  VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sssss", $productName, $brand, $price, $description, $imageURL);

    if ($stmt->execute() === TRUE) {
        echo "<script>alert('New product added successfully')</script>";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product to Comparison Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: auto;
        }
        input, textarea, button {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <h2>Add Product</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="imageURL">Image URL:</label>
        <input type="text" id="imageURL" name="imageURL" required>

        <button type="submit" name="addProduct">Add Product</button>
    </form>
</body>

</html>
