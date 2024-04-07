<?php
// Connect to Database
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
$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(32) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$preferencesTable = "CREATE TABLE IF NOT EXISTS preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    category VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($usersTable);
$conn->query($preferencesTable);

// Process signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // md5 for simplicity, consider using stronger encryption in production
    $categories = isset($_POST['categories']) ? $_POST['categories'] : [];

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    // Insert preferences
    $stmt = $conn->prepare("INSERT INTO preferences (user_id, category) VALUES (?, ?)");
    foreach($categories as $category) {
        $stmt->bind_param("is", $user_id, $category);
        $stmt->execute();
    }
    
    echo "Signup Successful";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>Signup to Customize Your News Feed</h2>
    <form action="" method="post">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="categories">Choose your preferred news categories:</label><br>
        <select multiple name="categories[]" id="categories">
            <option value="Technology">Technology</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Sports">Sports</option>
            <option value="Science">Science</option>
        </select><br>
        <input type="submit" value="Signup">
    </form>
</body>
</html>
