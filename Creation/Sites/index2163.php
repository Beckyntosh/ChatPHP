<?php
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

// Create table for languages if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS website_languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
code VARCHAR(30) NOT NULL,
name VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";
if ($conn->query($createTableSql) === TRUE) {
  echo ""; // Success
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert languages if not exists
$checkLanguagesSql = "SELECT COUNT(*) AS cnt FROM website_languages";
$result = $conn->query($checkLanguagesSql);
$row = $result->fetch_assoc();
if ($row['cnt'] == 0) {
    $insertSql = "INSERT INTO website_languages (code, name)
    VALUES ('en', 'English'), ('es', 'Spanish'), ('fr', 'French');";
    if ($conn->query($insertSql) === TRUE) {
      echo ""; // Success
    } else {
      echo "Error inserting languages: " . $conn->error;
    }
}

$langCode = 'en'; // Default language
if (isset($_GET['lang'])) {
    $langCode = $_GET['lang'];
}

// Fetching selected language content
$langQuery = $conn->prepare("SELECT name FROM website_languages WHERE code = ?");
$langQuery->bind_param("s", $langCode);
$langQuery->execute();
$langResult = $langQuery->get_result();

if ($langResult->num_rows > 0) {
  while($row = $langResult->fetch_assoc()) {
    $currentLanguage = $row['name'];
  }
} else {
  $currentLanguage = "English"; // Default language name
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="<?php echo $langCode; ?>">
<head>
    <meta charset="UTF-8">
    <title>Sporting Goods - <?php echo $currentLanguage; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { width: 80%; margin: auto; padding: 20px; }
        .language-selection { float: right; }
        .language-selection form { display: inline; }
        .language-selection select { padding: 5px; margin-left: 5px; }
    </style>
</head>
<body>

<div class="container">
    <div class="language-selection">
        <form action="" method="get">
            <label for="lang">Choose a language:</label>
            <select name="lang" id="lang" onchange="this.form.submit()">
                <option value="en" <?php if ($langCode == 'en') echo 'selected'; ?>>English</option>
                <option value="es" <?php if ($langCode == 'es') echo 'selected'; ?>>Spanish</option>
                <option value="fr" <?php if ($langCode == 'fr') echo 'selected'; ?>>French</option>
            </select>
        </form>
    </div>
    <h1>Welcome to Our Sporting Goods Website</h1>
    <p>This is a sample web application showcasing multilingual support.</p>
</div>

</body>
</html>
