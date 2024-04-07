<?php
// Prevent direct access without providing database connection details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Create products table if it does not exist
    $createProductsTable = "CREATE TABLE IF NOT EXISTS products (
                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(30) NOT NULL,
                            brand VARCHAR(30) NOT NULL,
                            description TEXT,
                            price DECIMAL(10, 2) NOT NULL,
                            reg_date TIMESTAMP
                            )";

    if ($conn->query($createProductsTable) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }

    // Add product to the database
    if (isset($_POST['name'], $_POST['brand'], $_POST['description'], $_POST['price'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $brand = $conn->real_escape_string($_POST['brand']);
        $description = $conn->real_escape_string($_POST['description']);
        $price = $conn->real_escape_string($_POST['price']);

        $sql = "INSERT INTO products (name, brand, description, price) VALUES ('$name', '$brand', '$description', '$price')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product to Comparison Tool</title>
</head>
<body>
    <h2>Add Product</h2>
    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="brand">Brand:</label><br>
        <input type="text" id="brand" name="brand" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
