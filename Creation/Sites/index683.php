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

// Initialize database tables if they don't exist
$initSql = [
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );",
    "INSERT INTO users (username, name, email, password) VALUES
    ('user1', 'User One', 'user1@example.com', SHA1('password1')),
    ('user2', 'User Two', 'user2@example.com', SHA1('password2')),
    ('user3', 'User Three', 'user3@example.com', SHA1('password3'));",
    "CREATE TABLE IF NOT EXISTS sessions (
        session_id CHAR(128) PRIMARY KEY,
        user_id INT,
        login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );"
];

foreach ($initSql as $sql) {
    if (!$conn->query($sql)) {
        // Handling initialization errors is important but omitted for brevity
    }
}

// Simple login logic for demonstration purposes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string(SHA1($_POST['password']));

    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $userId = $result->fetch_assoc()['id'];
        $sessionId = session_create_id();
        $insertSessionSql = "INSERT INTO sessions (session_id, user_id) VALUES ('$sessionId', '$userId');";
        if ($conn->query($insertSessionSql) === TRUE) {
            echo "User logged in successfully.";
        } else {
            echo "Error logging in user.";
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login to Spirits Social Networking Site</title>
    <style>
        body {
            background-color: #0e101c;
            color: #fff;
            font-family: 'Gothic A1', sans-serif;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        .login-form {
            max-width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #222237;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #000;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 8px;
            border: none;
            background-color: #333345;
            color: #ffffff;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #564d80;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <form action="" method="POST">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>

<?php
// Closing the connection
$conn->close();
?>