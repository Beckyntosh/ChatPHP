<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create language selection table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS language_selection (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    language_code VARCHAR(5) NOT NULL,
    language_name VARCHAR(50) NOT NULL,
    UNIQUE (language_code)
    )";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Insert some languages if they don't exist
$languages = [
    ['code' => 'en', 'name' => 'English'],
    ['code' => 'es', 'name' => 'Spanish'],
    ['code' => 'fr', 'name' => 'French'],
];

foreach ($languages as $lang) {
    $insertLang = "INSERT INTO language_selection (language_code, language_name) VALUES (?, ?) ON DUPLICATE KEY UPDATE language_name=VALUES(language_name)";
    $stmt = $conn->prepare($insertLang);
    $stmt->bind_param("ss", $lang['code'], $lang['name']);
    $stmt->execute();
}

// Check for a language selection
if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    $selectedLang = $_GET['lang'];
    $_SESSION['lang'] = $selectedLang; // Store the selected language in session
} elseif (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en'; // Default language is English
}

// Frontend: Language selection form
echo "<form action='' method='get'>";
echo "<select name='lang' onchange='this.form.submit()'>";
$query = "SELECT * FROM language_selection";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['language_code'] . "'" . ($row['language_code'] == $_SESSION['lang'] ? ' selected' : '') . ">" . $row['language_name'] . "</option>";
    }
}
echo "</select>";
echo "<noscript><input type='submit' value='Choose Language'></noscript>";
echo "</form>";

// Close connection
$conn->close();
?>
