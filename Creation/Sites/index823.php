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

// The SQL statement to create the tables
$sqlUserTable = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50)
)";

$sqlProductTable = "CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(8,2) NOT NULL,
    image VARCHAR(255)
)";

if ($conn->query($sqlUserTable) === TRUE && $conn->query($sqlProductTable) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Easter Watches Magazine</title>
    <style>
        body { background-color: #FFC0CB; font-family: Arial, sans-serif; }
        .product { float: left; width: 30%; margin: 5px; padding: 10px; border: 1px solid #000; border-radius: 10px; background-color: #FFF;}
        .product img { width: 100%; }
    </style>
</head>
<body>
    <h1>Welcome to Easter Watches Magazine</h1>
    <?php
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query("SELECT * FROM products");

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<img src="'.$row["image"].'" alt="'.$row["name"].' image">';
            echo '<h2>'.$row["name"].'</h2>';
            echo '<p>'.$row["description"].'</p>';
            echo '<p><strong>Price: '.$row["price"].'</strong></p>';
            echo '</div>';
        }
    } else {
        echo "<p>No products found...</p>";
    }

    $conn->close();
    ?>
</body>
</html>