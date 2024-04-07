<?php
// Simple language selection example for a Watches website

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Set the default language to English
$language = 'en';

// Check if a language has been selected
if(isset($_POST['language'])) {
    $language = $_POST['language'];
}

// SQL to fetch website content based on the selected language
$sql = "SELECT title, content FROM content WHERE language = ?";
if($stmt = $link->prepare($sql)) {
    $stmt->bind_param("s", $language);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $content = $result->fetch_all(MYSQLI_ASSOC);
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Watches - Multilingual Website</title>
</head>
<body>
    <form method="post">
        <select name="language" onchange="this.form.submit()">
            <option value="en" <?php echo $language == 'en' ? 'selected' : ''; ?>>English</option>
            <option value="es" <?php echo $language == 'es' ? 'selected' : ''; ?>>Español</option>
Add more languages here
        </select>
    </form>
    <div>
        <?php
        if(!empty($content)) {
            foreach($content as $row) {
                echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                echo "<p>" . htmlspecialchars($row['content']) . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>

<?php
// Close connection
$link->close();
?>