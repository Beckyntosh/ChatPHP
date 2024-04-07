

<?php

// Database configurations
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to the MySQL database 
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create table for storing user language preferences if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language VARCHAR(10) NOT NULL
) ENGINE=InnoDB;";
$pdo->exec($query);

// Check if the language selection form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['language'])){
    $language = $_POST['language'];

    // Insert or update user preference in the database
    $query = "INSERT INTO user_preferences (language) VALUES (:language) ON DUPLICATE KEY UPDATE language = :language";
    if($stmt = $pdo->prepare($query)){
        $stmt->bindParam(":language", $language, PDO::PARAM_STR);
        $stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Language Selection</title>
</head>
<body>
    <h2>Select your preferred language</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <select name="language" onchange="this.form.submit()">
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
        </select>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['language'])){
        echo "<p>Your preference has been saved as: " . htmlspecialchars($language) . "</p>";
    }
    ?>
</body>
</html>

Please note this code assumes the database and user credentials already exist and are properly configured. It's a simplified version designed for learning and research purposes. For a production environment, it's critical to implement security measures, error handling, and validation procedures beyond those demonstrated here.