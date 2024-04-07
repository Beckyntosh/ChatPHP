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

// Create table products if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
category VARCHAR(30) NOT NULL,
price DECIMAL(10, 2) NOT NULL,
description TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert new product if request is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO products (name, category, price, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $category, $price, $description);

    if ($stmt->execute() === TRUE) {
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product to Comparison Tool</title>
</head>
<body>
    <h1>Add Product</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
