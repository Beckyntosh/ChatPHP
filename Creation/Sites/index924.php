<?php
// Initialize the database connection
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

// Create users table if not exists
$usersTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
news_preferences VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Create news preferences table if not exists
$preferencesTableSql = "CREATE TABLE IF NOT EXISTS news_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(50) NOT NULL
)";

// Execute table creation
$conn->query($usersTableSql);
$conn->query($preferencesTableSql);

// Insert default news categories if not present
$defaultCategories = ['Education', 'Humor', 'Sports', 'Technology'];
foreach ($defaultCategories as $category) {
    $checkSql = "SELECT * FROM news_preferences WHERE category = '$category'";
    $result = $conn->query($checkSql);
    if (!$result->num_rows) {
        $insertCategorySql = "INSERT INTO news_preferences (category) VALUES ('$category')";
        $conn->query($insertCategorySql);
    }
}

// Handle user registration
$registrationError = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $news_preferences = implode(',', $_POST['news_preferences']);
    
    $checkUserSql = "SELECT * FROM users WHERE username = '$username'";
    $userResult = $conn->query($checkUserSql);
    if ($userResult->num_rows) {
        $registrationError = 'Username already exists.';
    } else {
        $registerSql = "INSERT INTO users (username, password, news_preferences) VALUES ('$username', '$password', '$news_preferences')";
        if ($conn->query($registerSql) === TRUE) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            $registrationError = 'Error registering user.';
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register for Customizable News Feed</title>
</head>
<body>
    <h2>Register for a Funny Style School Supplies News Feed</h2>
    <?php if ($registrationError) echo "<p style='color:red;'>$registrationError</p>"; ?>
    <form action="" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <label>News Preferences:</label><br>
        <select name="news_preferences[]" multiple required>
            <option value="Education">Education</option>
            <option value="Humor">Humor</option>
            <option value="Sports">Sports</option>
            <option value="Technology">Technology</option>
        </select><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>

