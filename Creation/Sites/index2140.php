<?php
// Define database connection constants
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

// Creating table if it doesn't exist
try {
    $query = "CREATE TABLE IF NOT EXISTS user_preferences (
                  id INT AUTO_INCREMENT PRIMARY KEY,
                  user_id INT NOT NULL,
                  homepage_layout VARCHAR(50) NOT NULL,
                  theme VARCHAR(50) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $pdo->exec($query);
    echo "Table created successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $userid = htmlspecialchars($_POST["userid"]);
    $layout = htmlspecialchars($_POST["homepage_layout"]);
    $theme = htmlspecialchars($_POST["theme"]);

    // Insert user preference into the database
    $sql = "INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (:userid, :layout, :theme)";
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":userid", $userid);
        $stmt->bindParam(":layout", $layout);
        $stmt->bindParam(":theme", $theme);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "Preferences saved successfully.";
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        unset($stmt);
    }
}

unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Preferences Setting</title>
</head>
<body>
    <h2>Set Your Homepage Preferences</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>User ID:</label>
            <input type="text" name="userid" required>
        </div>        
        <div>
            <label>Homepage Layout:</label>
            <select name="homepage_layout" required>
                <option value="compact">Compact</option>
                <option value="spacious">Spacious</option>
            </select>
        </div>
        <div>
            <label>Theme:</label>
            <select name="theme" required>
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Save Preferences">
        </div>
    </form>
</body>
</html>
