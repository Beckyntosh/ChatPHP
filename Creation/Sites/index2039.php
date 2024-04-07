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

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS my_database";
if ($conn->query($sql) === TRUE) {
  $conn->select_db($dbname);
} else {
  echo "Error creating database: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
brand VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert products if not exists
$products = [
    ['iPhone 13', 'Latest model of iPhone 13', 'Apple'],
    ['Samsung Galaxy S21', 'Latest model of Samsung S21', 'Samsung']
];

foreach ($products as $product) {
    $checkIfExists = "SELECT * FROM Products WHERE productName='" . $product[0] . "'";
    $result = $conn->query($checkIfExists);
    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO Products (productName, description, brand) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $product[0], $product[1], $product[2]);
        $stmt->execute();
    }
}

// Select products from the database
$sql = "SELECT id, productName, brand FROM Products";
$result = $conn->query($sql);

echo "<h2>Camera Comparison Tool</h2>";
if ($result->num_rows > 0) {
  // Output each row of the data
  echo "<form action='' method='post'>";
  echo "Select two cameras to compare:<br>";
  while($row = $result->fetch_assoc()) {
    echo "<input type='checkbox' name='product[]' value='".$row['id']."'>".$row['productName']."<br>";
  }
  echo "<input type='submit' value='Compare'>";
  echo "</form>";
} else {
  echo "No products found";
}

// Compare selected products
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['product']) && count($_POST['product']) == 2) {
        $productIds = $_POST['product'];
        $sql = "SELECT * FROM Products WHERE id IN ($productIds[0], $productIds[1])";
        $result = $conn->query($sql);

        if ($result->num_rows == 2) {
            $productsToCompare = $result->fetch_all(MYSQLI_ASSOC);

            echo "<h3>Comparison</h3>";
            echo "<table border='1'><tr>";
            foreach (['productName', 'description', 'brand'] as $column) {
                echo "<th>$column</th>";
            }
            echo "</tr>";
            foreach ($productsToCompare as $product) {
                echo "<tr>";
                foreach (['productName', 'description', 'brand'] as $column) {
                    echo "<td>".$product[$column]."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Error fetching product details";
        }
    } else {
        echo "Please select two products to compare";
    }
}

$conn->close();
?>
