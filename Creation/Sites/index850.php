<!DOCTYPE html>
<html>
<head>
    <title>Prescription Medications Blog</title>
    <style>
        body {
            background-color: #ADD8E6; /* Light Blue */
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #FF6347; /* Tomato */
        }
        form {
            margin: 20px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Prescription Medications Blog</h1>
    <h2>Upload Vector File</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Upload">
    </form>

    <h2>Enter System</h2>
    <form action="#" method="post">
        Username: <input type="text" name="username">
        Password: <input type="password" name="password">
        <input type="submit" value="Login">
    </form>

    <h2>Create Review</h2>
    <form action="#" method="post">
        Product Name: <input type="text" name="product_name">
        Review: <textarea name="review"></textarea>
        <input type="submit" value="Submit Review">
    </form>

    <h2>Search Products</h2>
    <form action="#" method="get">
        Search: <input type="text" name="search">
        <input type="submit" value="Search">
    </form>

    <h2>Upload Tutorial Document</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="tutorial_doc">
        <input type="submit" value="Upload">
    </form>

    <?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    )";

    $conn->query($sql);

    $sql = "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
        ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
        ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
        ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
        ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
        ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
        ('Product F', 'Description of Product F', 'Category3', 69.99, 90)";

    $conn->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    )";

    $conn->query($sql);

    $sql = "INSERT INTO users (username, name, email, password) VALUES
        ('user1', 'User One', 'user1@example.com', 'password1'),
        ('user2', 'User Two', 'user2@example.com', 'password2'),
        ('user3', 'User Three', 'user3@example.com', 'password3')";

    $conn->query($sql);

    $conn->close();
    ?>

</body>
</html>