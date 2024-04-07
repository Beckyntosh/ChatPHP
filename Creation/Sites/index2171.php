<?php
// Set content type to HTML
header('Content-Type: text/html; charset=utf-8');

// MySQL connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Establish MySQL connection
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Create table for languages if not exists
$createTable = "CREATE TABLE IF NOT EXISTS `languages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(2) NOT NULL,
    `name` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$mysqli->query($createTable);

// Insert initial data for languages
$defaultLanguages = [
    ['code' => 'en', 'name' => 'English'],
    ['code' => 'es', 'name' => 'Spanish'],
    ['code' => 'fr', 'name' => 'French'],
];
foreach ($defaultLanguages as $language) {
    $stmt = $mysqli->prepare("INSERT INTO languages (code, name) VALUES (?, ?) ON DUPLICATE KEY UPDATE name=VALUES(name)");
    $stmt->bind_param("ss", $language['code'], $language['name']);
    $stmt->execute();
}

$selectedLanguageCode = 'en'; // Default language
// Check if language is selected by the user
if (isset($_POST['language'])) {
    $selectedLanguageCode = $_POST['language'];
}

// Retrieve languages from database
$languageQuery = $mysqli->query("SELECT * FROM languages");
$languages = [];
while ($row = $languageQuery->fetch_assoc()) {
    $languages[$row['code']] = $row['name'];
}

// Close connection
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Organic Foods - Language Selection</title>
</head>
<body>
    <h1>Welcome to Organic Foods!</h1>
    <form action="" method="post">
        <label for="language">Choose your language:</label>
        <select name="language" id="language" onchange="this.form.submit()">
            <?php foreach ($languages as $code => $name): ?>
                <option value="<?php echo $code; ?>" <?php echo $selectedLanguageCode == $code ? 'selected' : ''; ?>>
                    <?php echo $name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
Display content based on selected language
    <?php if ($selectedLanguageCode == 'es'): ?>
        <p>Bienvenidos a Organic Foods! Su fuente de alimentos orgánicos.</p>
    <?php else: ?>
        <p>Welcome to Organic Foods! Your source for organic food.</p>
    <?php endif; ?>
</body>
</html>
