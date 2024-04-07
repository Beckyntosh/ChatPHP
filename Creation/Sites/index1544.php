<?php

// Database configuration
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('MYSQL_HOST', 'db');
define('MYSQL_USER', 'root');

// Establish connection to MySQL database
$connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_ROOT_PSWD, MYSQL_DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create table if not exists
$createTableSQL = "CREATE TABLE IF NOT EXISTS language_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    spanish_word VARCHAR(255) NOT NULL,
    english_translation VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (!$connection->query($createTableSQL)) {
    die("Error creating table: " . $connection->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["category"], $_POST["spanish_word"], $_POST["english_translation"])) {
    $category = $connection->real_escape_string($_POST["category"]);
    $spanishWord = $connection->real_escape_string($_POST["spanish_word"]);
    $englishTranslation = $connection->real_escape_string($_POST["english_translation"]);

    $insertSQL = "INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('$category', '$spanishWord', '$englishTranslation')";
    
    if (!$connection->query($insertSQL)) {
        die("Error inserting data: " . $connection->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Learning Content</title>
</head>
<body>
    <h2>Add Vocabulary to "Spanish for Beginners"</h2>
    <form action="" method="post">
        Category: <input type="text" name="category" required><br>
        Spanish Word: <input type="text" name="spanish_word" required><br>
        English Translation: <input type="text" name="english_translation" required><br>
        <input type="submit" value="Submit">
    </form>

    <h3>Vocabulary List</h3>
    <?php
    $selectSQL = "SELECT * FROM language_content";
    $result = $connection->query($selectSQL);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["spanish_word"] . " - " . $row["english_translation"] . " (" . $row["category"] . ")</li>";
        }
        echo "</ul>";
    } else {
        echo "No vocabulary found";
    }
    ?>
</body>
</html>

<?php $connection->close(); ?>
