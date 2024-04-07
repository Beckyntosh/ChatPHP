<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Language selection functionality
$selectedLang = 'en'; // default language
if(isset($_POST['language'])) {
    $selectedLang = $_POST['language'];
}

// Language strings
$translations = [
    'en' => ['title' => 'Sunglasses Store', 'welcome' => 'Welcome to our Sunglasses Store!'],
    'es' => ['title' => 'Tienda de Gafas de Sol', 'welcome' => '¡Bienvenido a nuestra tienda de Gafas de Sol!']
];

// Frontend HTML + PHP
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($selectedLang); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($translations[$selectedLang]['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($translations[$selectedLang]['welcome']); ?></h1>
    
    <form method="post">
        <select name="language">
            <option value="en" <?php echo $selectedLang == 'en' ? 'selected' : ''; ?>>English</option>
            <option value="es" <?php echo $selectedLang == 'es' ? 'selected' : ''; ?>>Español</option>
        </select>
        <button type="submit">Change Language</button>
    </form>
</body>
</html>
<?php
// Close connection
$conn->close();
?>
