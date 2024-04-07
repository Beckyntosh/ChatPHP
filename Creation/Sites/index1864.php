<?php
// Set default timezone for operations, adjust as per requirement
date_default_timezone_set('UTC');

// Database credentials as constants
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create languages table if it does not exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS languages (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(5) NOT NULL,
    name VARCHAR(50) NOT NULL,
    UNIQUE KEY (code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$pdo->exec($createTableSQL);

// Insert some default language options
$languages = [
    ['code' => 'en', 'name' => 'English'],
    ['code' => 'es', 'name' => 'Spanish'],
    ['code' => 'fr', 'name' => 'French']
];

$insertLanguageSQL = "INSERT INTO languages (code, name) VALUES (:code, :name) ON DUPLICATE KEY UPDATE name = VALUES(name);";
$stmt = $pdo->prepare($insertLanguageSQL);

foreach ($languages as $language) {
    $stmt->execute($language);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['language'])) {
    $userLanguage = $_POST['language'];
    // Store the selection in a cookie for a year
    setcookie('userLanguage', $userLanguage, time() + (86400 * 365), "/"); 
    // Reload the page
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// If a language cookie exists use that language, otherwise default to English
$userLanguage = isset($_COOKIE['userLanguage']) ? $_COOKIE['userLanguage'] : 'en';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Website - Language Selection</title>
</head>
<body>
    <h2>Select your preferred language</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <select name="language">
            <?php
            $getLanguagesSQL = "SELECT * FROM languages";
            $stmt = $pdo->query($getLanguagesSQL);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=\"".htmlspecialchars($row['code'])."\"".($row['code'] == $userLanguage ? ' selected' : '').">".htmlspecialchars($row['name'])."</option>";
            }
            ?>
        </select>
        <input type="submit" value="Change Language">
    </form>
</body>
</html>

<?php
$pdo = null; // Close database connection
?>
