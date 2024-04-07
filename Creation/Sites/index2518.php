<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create table for Language Preferences if it doesn't exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS language_preferences (
        id INT AUTO_INCREMENT PRIMARY KEY,
        language VARCHAR(50) NOT NULL
    )";

    $pdo->exec($sql);
} catch(PDOException $e){
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Handling user's submission
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $language = $_POST['language'];

    try{
        $sql = "INSERT INTO language_preferences (language) VALUES (:language)";
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters to statement
        $stmt->bindParam(':language', $language, PDO::PARAM_STR);
        
        // Execute the prepared statement
        $stmt->execute();
        echo "Language preference saved successfully.";
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    // Close statement
    unset($stmt);
}

// Close connection
unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Language Preference</title>
</head>
<body>
    <h2>Select Your Language Preference</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <select name="language" required>
            <option value="">Select Language...</option>
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
            <option value="German">German</option>
            <option value="Chinese">Chinese</option>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
