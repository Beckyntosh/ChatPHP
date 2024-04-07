<?php
// Connect to database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables if they don't exist
    $createUsersTable = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
        )";

    $createPreferencesTable = "CREATE TABLE IF NOT EXISTS preferences (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED,
        preference_type VARCHAR(50) NOT NULL,
        preference_value VARCHAR(255) NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id)
        )";

    // Execute table creation
    $conn->exec($createUsersTable);
    $conn->exec($createPreferencesTable);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $preferences = $_POST['preferences'];

    try {
        // Insert user
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $email]);
        $userId = $conn->lastInsertId();

        // Insert preferences
        foreach ($preferences as $preference) {
            $stmt = $conn->prepare("INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (?, ?, ?)");
            $stmt->execute([$userId, "news_category", $preference]);
        }

        echo "User registered successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Registration for Customizable News Feed</title>
</head>
<body>
<h2>User Registration</h2>
<form method="post" action="">
  Username:<br>
  <input type="text" name="username" required><br>
  Password:<br>
  <input type="password" name="password" required><br>
  Email:<br>
  <input type="email" name="email" required><br>
  Preferences:<br>
  <input type="checkbox" name="preferences[]" value="Skincare"> Skincare<br>
  <input type="checkbox" name="preferences[]" value="Trends"> Trends<br>
  <input type="checkbox" name="preferences[]" value="Research"> Research<br>
  <input type="checkbox" name="preferences[]" value="Products"> Products<br><br>
  <input type="submit" value="Register" name="register">
</form>
</body>
</html>
