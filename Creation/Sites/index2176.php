<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to create language table if not exists
function checkOrCreateLanguageTable($conn) {
    $createTableSQL = "CREATE TABLE IF NOT EXISTS languages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(5) NOT NULL,
        name VARCHAR(50) NOT NULL
    )";
    
    if (!$conn->query($createTableSQL)) {
        die("Error creating table: " . $conn->error);
    }

    // Insert some default languages
    $defaultLanguages = [
        ['code' => 'en', 'name' => 'English'],
        ['code' => 'es', 'name' => 'Spanish'],
        ['code' => 'fr', 'name' => 'French']
    ];

    foreach ($defaultLanguages as $language) {
        $checkEntry = "SELECT * FROM languages WHERE code = '" . $language['code'] . "'";
        $exists = $conn->query($checkEntry);
        if ($exists->num_rows == 0) {
            $insertLanguageSQL = "INSERT INTO languages (code, name) VALUES ('" . $language['code'] . "', '" . $language['name'] . "')";
            if (!$conn->query($insertLanguageSQL)) {
                die("Error inserting language: " . $conn->error);
            }
        }
    }
}

// Check or create the language table
checkOrCreateLanguageTable($conn);

// Determine the current language
$currentLanguage = 'en';
if (isset($_POST['language'])) {
    $currentLanguage = $_POST['language'];
}

// Fetch languages from database
$fetchLanguagesSQL = "SELECT * FROM languages";
$result = $conn->query($fetchLanguagesSQL);
$languages = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $languages[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Language Selection</title>
</head>
<body>
    <h1>Welcome to the Camera Store</h1>
    <form action="" method="post">
        <label for="language">Choose a language:</label>
        <select name="language" id="language" onchange='this.form.submit()'>
            <?php foreach ($languages as $language): ?>
                <option value="<?php echo $language['code']; ?>" <?php if ($currentLanguage == $language['code']) echo 'selected'; ?>>
                    <?php echo $language['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <?php
    // Load language-specific content
    switch ($currentLanguage) {
        case 'es':
            echo "<p>Bienvenido a nuestra tienda de cámaras.</p>";
            break;
        case 'fr':
            echo "<p>Bienvenue dans notre magasin d'appareils photo.</p>";
            break;
        case 'en':
        default:
            echo "<p>Welcome to our camera store.</p>";
    }
    ?>

    <p>Explore our expert-level cameras and accessories.</p>
</body>
</html>

<?php
$conn->close();
?>
