<?php
// Error Reporting ON
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database Configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL Database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Table creation if not exists
$createTables = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    preferences TEXT,
    reg_date TIMESTAMP
);
CREATE TABLE IF NOT EXISTS news_categories (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL UNIQUE
);
INSERT INTO news_categories (category_name) VALUES ('Politics'),('Technology'),('Entertainment'),('Sports'),('Science')
ON DUPLICATE KEY UPDATE category_name=category_name;";

if (!$conn->multi_query($createTables)) {
    echo "Error creating tables: " . $conn->error;
}

// Wait for multi_queries to finish
while ($conn->more_results() && $conn->next_result()) {;}

// Handle Registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $preferences = isset($_POST['preferences']) ? json_encode($_POST['preferences']) : json_encode([]);

    $sql = "INSERT INTO users (username, password, preferences) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $username, $password, $preferences);
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register for Customizable News Feed</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label>Select your news preferences:</label><br>
        <input type="checkbox" id="politics" name="preferences[]" value="Politics">
        <label for="politics">Politics</label><br>
        <input type="checkbox" id="technology" name="preferences[]" value="Technology">
        <label for="technology">Technology</label><br>
        <input type="checkbox" id="entertainment" name="preferences[]" value="Entertainment">
        <label for="entertainment">Entertainment</label><br>
        <input type="checkbox" id="sports" name="preferences[]" value="Sports">
        <label for="sports">Sports</label><br>
        <input type="checkbox" id="science" name="preferences[]" value="Science">
        <label for="science">Science</label><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
