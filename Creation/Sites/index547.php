<?php
session_start();

// Database configuration
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

// Create tables if not exist
$initSql = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );",
    "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
    ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
    ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
    ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
    ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
    ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
    ('Product F', 'Description of Product F', 'Category3', 69.99, 90);",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );",
    "INSERT INTO users (username, name, email, password) VALUES
    ('user1', 'User One', 'user1@example.com', 'password1'),
    ('user2', 'User Two', 'user2@example.com', 'password2'),
    ('user3', 'User Three', 'user3@example.com', 'password3');"
];

foreach ($initSql as $sql) {
    if ($conn->query($sql) === FALSE) {
        echo "Error creating table/initiating database: " . $conn->error;
    }
}

// Handling login
if (isset($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
    } else {
        $login_error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stellar Space Toys Auction Site</title>
    <style>
        body {
            background-color: #0a0b1d;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #16172b;
            border-radius: 10px;
        }
        .form-input {
            margin-bottom: 10px;
            display: block;
            width: 100%;
            padding: 10px;
            border: 1px solid #333C57;
            border-radius: 5px;
            background-color: #0a0b1d;
            color: #fff;
        }
        .form-submit {
            padding: 10px 20px;
            background-color: #4A4E69;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .form-submit:hover {
            background-color: #6c7293;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login to Stellar Space Toys Auction</h2>
        <?php if (isset($login_error)): ?>
            <p style="color: red;"><?php echo $login_error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required class="form-input">
            <input type="password" name="password" placeholder="Password" required class="form-input">
            <input type="submit" value="Login" class="form-submit">
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>