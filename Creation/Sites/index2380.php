<?php
// Define database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if not exists
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($userTable) === TRUE) {
    // Table successfully created or exists
} else {
    echo "Error creating table: " . $conn->error;
}

// User registration handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $registerUser = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $registerUser->bind_param("sss", $username, $hashedPassword, $email);

    if ($registerUser->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $registerUser->error;
    }

    $registerUser->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Online Coding Course</title>
</head>
<body>
    <h2>User Signup</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
