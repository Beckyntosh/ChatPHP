<?php
// Set database connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create language selection table if not exists
try {
    $sql = "CREATE TABLE IF NOT EXISTS languages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        code VARCHAR(10) NOT NULL UNIQUE
    )  ENGINE=INNODB;";

    $pdo->exec($sql);

    // Insert some default languages
    $languages = [
        ['English', 'en'],
        ['Español', 'es'],
        ['Français', 'fr'],
        ['Deutsch', 'de'],
    ];

    foreach ($languages as $language) {
        $sql = "INSERT IGNORE INTO languages (name, code) VALUES (?, ?)";
        $pdo->prepare($sql)->execute([$language[0], $language[1]]);
    }

} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Process form when posted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $language = $_POST['language'];
    // Insert query preparation
    $sql = "INSERT INTO users (username, language_id) VALUES (:username, (SELECT id FROM languages WHERE code = :language))";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":language", $language, PDO::PARAM_STR);

        if($stmt->execute()){
            echo "Account Created Successfully!";
        } else{
            echo "Something went wrong. Please try again later.";
        }
        
        // Close statement
        unset($stmt);
    }
}

// Close connection
unset($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Language Preference:</label>
            <select name="language" required>
                <?php 
                // Fetch all languages
                $sql = "SELECT * FROM languages";
                foreach ($pdo->query($sql) as $row) {
                    echo "<option value=\"" . $row['code'] . "\">" . $row['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Sign Up">
        </div>
    </form>
</body>
</html>
