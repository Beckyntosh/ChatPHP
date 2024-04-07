<?php
// Connection vars
$host = 'db';
$db = 'my_database';
$user = 'root';
$pass = 'root';

// Connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check and create tables if not exists
$checkTablesSQL = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    description TEXT,
    ingredients TEXT,
    steps TEXT,
    image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
";
if (!$conn->multi_query($checkTablesSQL)) {
    echo "Error creating tables: " . $conn->error;
}

// Close the multi_query loop
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->next_result());

// Authentication check
session_start();
$loggedIn = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, name FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        $loggedIn = true;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Food and Recipe Sharing Site</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #fdf6e3;
            color: #586e75;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .login-form,
        .welcome-message {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Rustic Retreat Jewelry Food and Recipe Sharing Site</h1>
        <?php if (!$loggedIn): ?>
        <div class="login-form">
            <form action="" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" name="login" value="Login">
            </form>
        </div>
        <?php else: ?>
        <div class="welcome-message">
            <p>Welcome <?php echo htmlspecialchars($_SESSION['name']); ?>! You are logged in.</p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>