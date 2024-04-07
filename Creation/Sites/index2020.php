<?php
// Establish connection to database
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

// Create table for products if it does not exist
$productTable = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    brand VARCHAR(30) NOT NULL,
    type VARCHAR(50),
    price DECIMAL(10, 2),
    description TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($productTable) === FALSE) {
    echo "Error creating table: " . $conn->error;
}


// Insert product dummy data - Let's assume it is coming from POST request for simplicity
$product1 = "INSERT INTO products (name, brand, type, price, description) VALUES ('Lipstick', 'Medieval Magic', 'Makeup', 19.99, 'Luxurious medieval shade of crimson red')";
$product2 = "INSERT INTO products (name, brand, type, price, description) VALUES ('Eyeliner', 'Ancient Alchemy', 'Makeup', 15.99, 'Deep black for a mystic look')";

if ($conn->query($product1) === TRUE && $conn->query($product2) === TRUE) {
    // Only for initial dummy setup
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Comparison Tool</title>
    <style type="text/css">
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #F5F5DC;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Product Comparison Tool</h2>

<?php
$sql = "SELECT id, name, brand, price, description FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Product Name</th><th>Brand</th><th>Price</th><th>Description</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["brand"]."</td><td>".$row["price"]."</td><td>".$row["description"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
