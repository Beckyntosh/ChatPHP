<?php
// Define MySQL connection parameters
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

// Function to get available languages
function getLanguages($pdo) {
    $sql = "SELECT * FROM languages";
    
    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    return [];
}

// Function to get website content based on selected language
function getContentByLanguage($pdo, $languageCode) {
    $sql = "SELECT content FROM website_content WHERE language_code = :language_code";
    
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(':language_code', $languageCode, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    return null;
}

// Check selected language
$selectedLanguage = 'en'; // Default language
if (isset($_POST['language'])) {
    $selectedLanguage = $_POST['language'];
}

// Fetch available languages
$languages = getLanguages($pdo);

// Fetch website content based on selected language
$content = getContentByLanguage($pdo, $selectedLanguage);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laptops Website - Multilingual Support</title>
</head>
<body>

<h1><?php echo htmlspecialchars($content['content']); ?></h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="language">Choose a language:</label>
    <select name="language" id="language" onchange="this.form.submit()">
        <?php foreach ($languages as $language): ?>
            <option value="<?= htmlspecialchars($language['code']); ?>" <?php if ($selectedLanguage == $language['code']) echo 'selected'; ?>>
                <?= htmlspecialchars($language['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

</body>
</html>
<?php
// Close connection
$pdo = null;
?>
