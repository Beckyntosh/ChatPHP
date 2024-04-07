<?php
// Database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connecting to database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if the users table exists, and create if not
try {
    $query = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL UNIQUE,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL
        );
    ";
    $pdo->exec($query);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $query. " . $e->getMessage());
}

// Helper function for creating users - For simple demonstration purposes
function createUser($username, $name, $email, $password, $pdo) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, name, email, password) VALUES (?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $name, $email, $passwordHash]);
    } catch (PDOException $e) {
        // Normally, you'd check for a duplicate username and handle accordingly.
        // This is a simplified example.
        die("ERROR: Could not able to execute $query. " . $e->getMessage());
    }
}

// Create a user - This is not secure nor proper practice for a real application. Just a simple demo.
// createUser('exampleUser', 'Example Name', 'example@example.com', 'password', $pdo);

// User authentication
session_start();

// If user is submitting login credentials
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT id, username, password FROM users WHERE username = ?";
    if ($stmt = $pdo->prepare($query)) {
        $stmt->execute([$username]);
        if ($stmt->rowCount() == 1) {
            if ($row = $stmt->fetch()) {
                $id = $row['id'];
                $username = $row['username'];
                $hashed_password = $row['password'];
                if (password_verify($password, $hashed_password)) {
                    // Password is correct
                    session_regenerate_id();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    header("location: welcome.php"); // Redirect user to welcome page
                } else {
                    // Display an error message if password is not valid
                    echo "Invalid username or password.";
                }
            }
        } else {
            // Display an error message if username doesn't exist
            echo "Invalid username or password.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Cameras Social Network</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: 50px auto;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to Cameras Social Network</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>