<?php
// Set default language
$language = 'en';

// Language selection
if (isset($_POST['language'])) {
    $language = $_POST['language'];
}

// Database Configuration
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

// Check if language selection table exists, create it if it does not
$tableCheckQuery = "SHOW TABLES LIKE 'language_selection'";
$result = $conn->query($tableCheckQuery);

if ($result->num_rows == 0) {
    // SQL to create table
    $sql = "CREATE TABLE language_selection (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    language_code VARCHAR(30) NOT NULL,
    language_text VARCHAR(30) NOT NULL,
    UNIQUE KEY unique_language (language_code)
    )";
    
    if ($conn->query($sql) === TRUE) {
        // Populate the table with some initial data
        $conn->query("INSERT INTO language_selection (language_code, language_text) VALUES ('en', 'English'), ('es', 'Español')");
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Fetch available languages
$sql = "SELECT * FROM language_selection";
$result = $conn->query($sql);

$languages = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $languages[$row["language_code"]] = $row["language_text"];
    }
} 

// Close connection
$conn->close();

// Language translation example content
$content = [
    'en' => 'Welcome to our Craft Beers Website!',
    'es' => '¡Bienvenido a nuestro sitio web de Cervezas Artesanales!'
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Craft Beers Website</title>
</head>
<body>

<h2><?php echo isset($content[$language]) ? $content[$language] : 'Welcome'; ?></h2>

<form action="" method="post">
    <select name="language" onchange="this.form.submit()">
        <?php foreach ($languages as $code => $text): ?>
            <option value="<?php echo $code; ?>" <?php echo $code == $language ? 'selected' : ''; ?>><?php echo $text; ?></option>
        <?php endforeach; ?>
    </select>
</form>

</body>
</html>
