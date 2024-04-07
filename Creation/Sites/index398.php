<?php
// Simple version for educational purpose - ensure security enhancements before production deployment

// Connection variables
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

// Create USERS and NEWS_PREFERENCES tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS USERS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100)
)";

if (!$conn->query($sql)) {
    die("Error creating USERS table: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS NEWS_PREFERENCES (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON DELETE CASCADE
)";

if (!$conn->query($sql)) {
    die("Error creating NEWS_PREFERENCES table: " . $conn->error);
}

// Signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $categories = $_POST['categories'] ?? [];

    // Insert user data
    $stmt = $conn->prepare("INSERT INTO USERS (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();

    $user_id = $stmt->insert_id;

    // Insert user news preferences
    $stmt = $conn->prepare("INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (?, ?)");
    foreach ($categories as $category) {
        $stmt->bind_param("is", $user_id, $category);
        $stmt->execute();
    }
    
    echo "Registration successful!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register for Custom News Feed</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="post">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>News Categories Preferences:</label><br>
            <input type="checkbox" name="categories[]" value="Luxury Watches"> Luxury Watches<br>
            <input type="checkbox" name="categories[]" value="Vintage Collections"> Vintage Collections<br>
            <input type="checkbox" name="categories[]" value="Sport Watches"> Sport Watches<br>
        </div>
        <button type="submit" name="signup">Signup</button>
    </form>
</body>
</html>