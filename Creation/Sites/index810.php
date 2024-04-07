<?php
// Connection parameters
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

// Create tables if not exists
$initSQL = "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            description TEXT,
            category VARCHAR(100),
            price DECIMAL(10, 2),
            stock_quantity INT
            );

            INSERT INTO products (name, description, category, price, stock_quantity) VALUES
            ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
            ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
            ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
            ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
            ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
            ('Product F', 'Description of Product F', 'Category3', 69.99, 90);

            CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30),
            name VARCHAR(30),
            email VARCHAR(50),
            password VARCHAR(255)
            );

            INSERT INTO users (username, name, email, password) VALUES
            ('user1', 'User One', 'user1@example.com', 'password1'),
            ('user2', 'User Two', 'user2@example.com', 'password2'),
            ('user3', 'User Three', 'user3@example.com', 'password3');
            ";

if ($conn->multi_query($initSQL) === TRUE) {
    do {
        /* store first result set */
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
                echo "."; // Just to avoid the output being completely empty. In real scenario, you probably don't need this.
            }
            $result->free();
        }
        /* print divider */
        if ($conn->more_results()) {
            echo ".";
        }
    } while ($conn->next_result());
} else {
    echo "Error creating table: " . $conn->error;
}

// User login check
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, username, name FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        echo "Welcome " . $user["name"];
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sporting Goods Marketplace - Art Deco Delight</title>
    <style>
        body {
            font-family: 'Art Deco', sans-serif;
            background-color: #c2b280;
            color: #2f4f4f;
        }
        .login {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: #f3f3f3;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: none;
            background-color: #e8e8e8;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            background-color: #4e4e50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #3e3e40;
        }
    </style>
</head>
<body>
    <div class="login">
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>