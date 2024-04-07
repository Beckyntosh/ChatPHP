// PARAMETERS: Function: Language Preference Selection during Signup: create an example feature for language preference selection during signup. Example: User selects their preferred interface language during account creation Product: Makeup Style: authentic
<?php
// Setup connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$charset = "utf8mb4";

// Create connection
try {
    $dsn = "mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=" . $charset;
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table if it doesn't exist
    $query = "CREATE TABLE IF NOT EXISTS users (
              id INT AUTO_INCREMENT PRIMARY KEY,
              username VARCHAR(50) NOT NULL,
              email VARCHAR(100) NOT NULL,
              language VARCHAR(10) NOT NULL,
              reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($query);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(strip_tags($_POST['username']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $language = htmlspecialchars(strip_tags($_POST['language']));

    $query = "INSERT INTO users (username, email, language) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);

    if ($stmt->execute([$username, $email, $language])) {
        echo "Account Created Successfully. Preferred Language: " . $language;
    } else {
        echo "There was an error creating the account.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp - Makeup Website</title>
</head>
<body>
    <h2>Create your account</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="language">Preferred Language:</label><br>
        <select id="language" name="language" required>
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
            <option value="German">German</option>
        </select><br><br>
        <input type="submit" value="Signup">
    </form>
</body>
</html>
