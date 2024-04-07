<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create Language Preference Table if it does not exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS LanguagePreferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";
$mysqli->query($createTableQuery);

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $language = $mysqli->real_escape_string(trim($_POST["language"]));

    $insertQuery = "INSERT INTO LanguagePreferences (language) VALUES (?)";
    if($stmt = $mysqli->prepare($insertQuery)){
        $stmt->bind_param("s", $language);
        
        if($stmt->execute()){
            echo "<p>Preference saved successfully.</p>";
        } else {
            echo "<p>Error: Could not execute the query.</p>";
        }
    }
    $stmt->close();
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Language Preference</title>
</head>
<body>
    <h2>Select Your Language Preference</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="language">Language:</label>
        <select name="language" id="language" required>
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
            <option value="German">German</option>
            <option value="Chinese">Chinese</option>
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
