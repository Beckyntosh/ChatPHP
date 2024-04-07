<?php
// Set up connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create languages table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_code VARCHAR(5) NOT NULL,
language_name VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";
$conn->query($createTable);

// Check for language submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['language'])) {
    $selectedLanguage = $_POST['language'];
    // Set language cookie for 30 days
    setcookie('userLanguage', $selectedLanguage, time() + (86400 * 30), "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Function to fetch available languages from database
function fetchLanguages($conn) {
    $sql = "SELECT * FROM languages";
    $result = $conn->query($sql);
    $languages = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $languages[$row["language_code"]] = $row["language_name"];
        }
    }
    return $languages;
}

// Populate languages table with some initial data
$defaultLanguages = [
    ['en', 'English'],
    ['es', 'Spanish'],
    ['fr', 'French']
];

foreach ($defaultLanguages as $lang) {
    $insertLang = $conn->prepare("INSERT INTO languages (language_code, language_name) VALUES (?, ?) ON DUPLICATE KEY UPDATE language_name=VALUES(language_name)");
    $insertLang->bind_param("ss", $lang[0], $lang[1]);
    $insertLang->execute();
}

// Fetch languages for selection
$languages = fetchLanguages($conn);

// Language selection form
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Language</title>
</head>
<body>
    <form action="" method="post">
        <label for="language">Choose a language:</label>
        <select name="language" id="language">';

foreach ($languages as $code => $name) {
    echo "<option value=\"$code\">$name</option>";
}

echo '  </select>
        <input type="submit" value="Change Language">
    </form>
</body>
</html>';

// Close connection
$conn->close();
?>
