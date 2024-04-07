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

// Create Products table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(30) NOT NULL,
price DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SSL Secured Groceries Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            text-align: center;
        }
        .content {
            margin: auto;
            width: 50%;
            padding: 20px;
        }
        .product {
            background-color: #ffd700;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Welcome to Our Groceries Store!</h1>
        <h2>Find fresh groceries for your family</h2>
        <?php
        $sql = "SELECT id, productName, price FROM Products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'><strong>" . $row["productName"]. "</strong> - $" . $row["price"]. "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
