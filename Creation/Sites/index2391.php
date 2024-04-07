
Furthermore, handling user data and browsing history requires careful consideration of privacy laws and regulations, such as GDPR in Europe. Ensure you have the necessary consent mechanisms in place.

Here's a basic demonstration, integrating frontend (HTML/CSS) and backend (PHP) within a single file for simplicity. Note, this does not include user authentication mechanics like login/logout sessions for brevity. Also, this example assumes you have a working Apache/Nginx, PHP, and MySQL environment.


<?php
// Database config
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Creating tables if they don't exist
try {
    $query = "CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        email VARCHAR(255) NOT NULL UNIQUE
    )";

    $pdo->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS browsing_history (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        product_viewed VARCHAR(255) NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )";

    $pdo->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS recommendations (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        recommended_product VARCHAR(255) NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )";

    $pdo->exec($query);
} catch(PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Placeholder for handling signups and tracking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Add user email to database (simplified example without validation)
    $sql = "INSERT INTO users (email) VALUES (:email)";
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<p>Thank you for signing up. Recommendations will appear as you browse.</p>";
        } else {
            echo "<p>Sorry, something went wrong. Please try again later.</p>";
        }
    }
    unset($stmt);
}

// Placeholder for displaying recommendations (demonstration only, not functional logic)
function displayRecommendations() {
    echo "<h2>Recommended for You</h2>";
    // Here would be the logic to fetch personalized recommendations based on the user's browsing history
    echo "<p>Product 1</p>";
    echo "<p>Product 2</p>";
    // etc.
}

// Closing connection
unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hair Care Recommendations</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>
    <h1>Welcome to Our Hair Care Site</h1>
    <p>Sign up for personalized product recommendations!</p>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <input type="submit" value="Sign Up">
    </form>

    <?php displayRecommendations(); ?>
</body>
</html>

This code snippet is highly simplified and not suitable for a secure production environment. Additionally, actual implementation of personalized recommendations would involve complex algorithms possibly integrating machine learning techniques based on comprehensive data analysis, which goes beyond the scope of this example. Always ensure you're following best practices for security, data protection, and ethical considerations when developing and deploying such systems.