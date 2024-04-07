<?php
// Database connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating LANGUAGES table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS LANGUAGES (
id INT AUTO_INCREMENT PRIMARY KEY,
code VARCHAR(5) NOT NULL,
name VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Insert default languages
$languages = [
    ['code' => 'en', 'name' => 'English'],
    ['code' => 'es', 'name' => 'Spanish']
];

foreach ($languages as $language) {
    $sql = "INSERT INTO LANGUAGES (code, name) VALUES ('" . $language['code'] . "', '" . $language['name'] . "') ON DUPLICATE KEY UPDATE name = '" . $language['name'] . "';";
    if (!$conn->query($sql) === TRUE) {
        die("Error inserting languages: " . $conn->error);
    }
}

// Handling language selection
$selectedLang = 'en'; // default language
if (isset($_GET['lang'])) {
    $selectedLang = $conn->real_escape_string($_GET['lang']);
}

// Fetching selected language
$sql = "SELECT * FROM LANGUAGES WHERE code = '".$selectedLang."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $selectedLangName = $row['name'];
} else {
    die("Language not found");
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sunglasses Shop - Select Language</title>
</head>
<body>
<h1>Welcome to the Sunglasses Shop</h1>
<h2>Language: <?php echo $selectedLangName; ?></h2>
<form action="">
    <label for="lang">Choose a language:</label>
    <select name="lang" id="lang" onchange="this.form.submit()">
        <option value="en" <?php echo $selectedLang == 'en' ? 'selected' : ''; ?>>English</option>
        <option value="es" <?php echo $selectedLang == 'es' ? 'selected' : ''; ?>>Spanish</option>
    </select>
</form>
</body>
</html>
