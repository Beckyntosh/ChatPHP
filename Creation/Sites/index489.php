<?php
// We cannot provide the full SSL/TLS configuration here, as setting up HTTPS involves server configuration
// outside the scope of a PHP script. This example assumes you've already configured your server for HTTPS.

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

// Create table for storing maternity wear products if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS maternity_wear (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(256) NOT NULL,
product_description TEXT,
product_price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table maternity_wear created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// HTML + PHP for the frontend part
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Maternity Wear</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333;}
        .container {width: 80%; margin: auto; overflow: hidden;}
        header {background: #50a3a2; color: #fff; padding-top: 30px; min-height: 70px; border-bottom: #077187 1px solid;}
        header h1 {text-align: center; margin: 0; font-size: 2em;}
        .content {display: flex; justify-content: space-around; margin-top: 20px;}
        .product {background: #ffffff; padding: 20px; margin: 20px; border: 1px solid #ddd;}
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>UltraPrecise Maternity Wear</h1>
        </div>
    </header>

    <div class="container content">
        <?php
        $sql = "SELECT id, product_name, product_description, product_price FROM maternity_wear";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<h2>". $row["product_name"]. "</h2>";
                echo "<p>". $row["product_description"]. "</p>";
                echo "<p><b>Price:</b> $". $row["product_price"]. "</p>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>