<?php
// Database configuration
$hostname = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$init_sql = [
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

foreach ($init_sql as $sql) {
    if ($conn->query($sql) === TRUE) {
        // Table creation or data insertion successful
    } else {
        echo "Error creating table or inserting data: " . $conn->error;
    }
}

// Easter themed style
echo '<style>
body {
    background-color: #FFF3E0;
    font-family: Arial, sans-serif;
}
h1, h2 {
    color: #FF7043;
}
.form-group {
    margin-bottom: 15px;
}
label {
    display: block;
    margin-bottom: 5px;
}
input[type="text"],
input[type="password"] {
    width: 300px;
    padding: 10px;
    border: 1px solid #FFB74D;
    border-radius: 5px;
}
input[type="submit"] {
    background-color: #FF7043;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #FF5722;
}
</style>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Attempt to verify user
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h2>Welcome back, " . htmlspecialchars($username) . "!</h2>";
    } else {
        echo "<h2>Invalid credentials. Please try again.</h2>";
    }
}

// Member verification form
echo '<h1>Organic Foods Online Magazine - Member Verification</h1>
<form method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>
    <input type="submit" value="Verify">
</form>';

$conn->close();
?>