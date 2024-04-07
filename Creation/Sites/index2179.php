<?php
// Define database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if the language selection form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['language'])) {
    $language = $_POST['language'];

    // Store the selected language in a session variable
    session_start();
    $_SESSION['language'] = $language;

    // You could also implement additional functionality such as storing the user's language preference in the database here.
}

// If no session is found, default language is English
if(!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'English';
}

// Text translations for the website (consider expanding this array or using a database for scalability)
$translations = [
    'English' => [
        'welcome_message' => 'Welcome to our Post-Apocalyptic Jewelry Website',
        'select_language' => 'Select Language',
    ],
    'Spanish' => [
        'welcome_message' => 'Bienvenido a nuestro sitio web de joyería post-apocalíptica',
        'select_language' => 'Seleccionar idioma',
    ],
];

// Get current language texts
$texts = $translations[$_SESSION['language']];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post-Apocalyptic Jewelry Website</title>
</head>
<body>
    <h1><?php echo $texts['welcome_message']; ?></h1>
    <form method="post">
        <label><?php echo $texts['select_language']; ?>:</label>
        <select name="language" onchange="this.form.submit()">
            <option value="English" <?php echo $_SESSION['language'] == 'English' ? 'selected' : ''; ?>>English</option>
            <option value="Spanish" <?php echo $_SESSION['language'] == 'Spanish' ? 'selected' : ''; ?>>Spanish</option>
        </select>
    </form>
</body>
</html>
