<?php
// Language Selection for a Baby Products Website

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for languages if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS website_languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_code VARCHAR(5) NOT NULL,
language_name VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    // Table is created or exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert languages into the table
$languages = [
    ['code' => 'en', 'name' => 'English'],
    ['code' => 'es', 'name' => 'Spanish'],
    // Add other languages as needed
];

foreach ($languages as $lang) {
    $checkLangExists = "SELECT * FROM website_languages WHERE language_code = '" . $lang['code'] . "'";
    $result = $conn->query($checkLangExists);

    if ($result->num_rows == 0) {
        $insertLang = "INSERT INTO website_languages (language_code, language_name) VALUES ('" . $lang['code'] . "', '" . $lang['name'] . "')";
        if (!$conn->query($insertLang) === TRUE) {
            echo "Error: " . $insertLang . "<br>" . $conn->error;
        }
    }
}

// Handle language selection by user
$selectedLanguage = 'en'; // default language
if (isset($_POST['language'])) {
    $selectedLanguage = $_POST['language'];
    // store the selected language in the session or cookie as needed
}

// Fetching available languages from the database
$getLanguages = "SELECT * FROM website_languages";
$result = $conn->query($getLanguages);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Baby Products Website - Choose your Language</title>
</head>
<body>

<h2>Select Your Preferred Language</h2>

<form action="" method="post">
    <label for="language">Choose a language:</label>
    <select name="language" id="language">
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $isSelected = $selectedLanguage == $row['language_code'] ? 'selected' : '';
                echo "<option value='" . $row['language_code'] . "' $isSelected>" . $row['language_name'] . "</option>";
            }
        } else {
            echo "<option value='en'>English</option>"; // Fallback option
        }
        ?>
    </select>
    <button type="submit">Change Language</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
