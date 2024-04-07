<?php

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Create portfolio table if it doesn't exist
$portfolioTableSql = "CREATE TABLE IF NOT EXISTS portfolio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(product_id) REFERENCES products(id)
);";
$pdo->exec($portfolioTableSql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $productId = $_POST['productId'];

    $sql = "INSERT INTO portfolio (user_id, product_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId, $productId]);

    echo "<script>alert('Product added to portfolio successfully!');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skin Care Products - Create Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4ed;
            color: #515744;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input, select {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #88a097;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #779987;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Product to Portfolio</h1>
        <form action="" method="post">
            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId" required>

            <label for="productId">Product ID:</label>
            <input type="text" id="productId" name="productId" required>
            
            <input type="submit" value="Add to Portfolio">
        </form>
    </div>
</body>
</html>