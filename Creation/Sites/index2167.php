<?php
// Database connection setup
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

// Create table for language content if it doesn't exist
$langTableSql = "CREATE TABLE IF NOT EXISTS website_content (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    content_key VARCHAR(50) NOT NULL,
    english TEXT NOT NULL,
    spanish TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($langTableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Example content if needed. Ideally this should be handled through a CMS or admin interface
$checkSql = "SELECT COUNT(*) as total FROM website_content";
$result = $conn->query($checkSql);
$data = $result->fetch_assoc();
if ($data['total'] == 0) {
    $insertSql = "INSERT INTO website_content (content_key, english, spanish) VALUES 
    ('welcome_message', 'Welcome to Our Prescription Medications Website', 'Bienvenido a nuestro sitio web de medicamentos recetados')";
    if ($conn->query($insertSql) !== TRUE) {
        echo "Error inserting data: " . $conn->error;
    }
}

// Handle language selection
$language = "english"; // Default language
if (isset($_GET["lang"])) {
    $language = $_GET["lang"];
}

// Fetch content based on language selection
$contentSql = "SELECT * FROM website_content";
$contentResult = $conn->query($contentSql);
$websiteContent = [];
if ($contentResult->num_rows > 0) {
    while($row = $contentResult->fetch_assoc()) {
        $websiteContent[$row["content_key"]] = $row[$language];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Medications Website</title>
</head>
<body>
    <div>
        <h1><?php echo $websiteContent['welcome_message'] ?? 'Welcome'; ?></h1>
    </div>
    <div>
        <a href="?lang=english">English</a> | <a href="?lang=spanish">Spanish</a>
    </div>
</body>
</html>
