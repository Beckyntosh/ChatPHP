<?php
    // Define database parameters
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

    // Check if language is set in the query, otherwise default to English
    $language = isset($_GET['lang']) ? $_GET['lang'] : 'en';

    // SQL to create table for languages if not exists
    $sql = "CREATE TABLE IF NOT EXISTS Languages (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            code VARCHAR(2) NOT NULL,
            name VARCHAR(30) NOT NULL
            )";

    if ($conn->query($sql) === TRUE) {
        // Table created or already exists
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Inserting example languages
    $languages = [
        ['code' => 'en', 'name' => 'English'],
        ['code' => 'es', 'name' => 'Spanish'],
        ['code' => 'fr', 'name' => 'French']
        // Add more languages as needed
    ];

    foreach ($languages as $lang) {
        $code = $lang['code'];
        $name = $lang['name'];
        $checkIfExists = "SELECT * FROM Languages WHERE code = '$code'";
        $res = $conn->query($checkIfExists);

        if ($res->num_rows == 0) {
            $sql = "INSERT INTO Languages (code, name) VALUES ('$code', '$name')";
            if (!$conn->query($sql) === TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Fetch available languages from the database
    $sql = "SELECT * FROM Languages";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Selection</title>
</head>
<body>
    <h2>Welcome to the Toys Website</h2>
    <p>Select your preferred language:</p>
    <ul>
        <?php 
            if ($result->num_rows > 0) {
                // Output each language as a list item
                while($row = $result->fetch_assoc()) {
                    echo "<li><a href='?lang=". $row["code"] ."'>". $row["name"] ."</a></li>";
                }
            } else {
                echo "0 languages found";
            }
        ?>
    </ul>

    <div>
        <?php
            // Display content based on selected language
            switch ($language) {
                case 'en':
                    echo "<p>Welcome to our toy website! Have fun exploring our unique and funny toys.</p>";
                    break;
                case 'es':
                    echo "<p>¡Bienvenido a nuestro sitio web de juguetes! Diviértete explorando nuestros juguetes únicos y divertidos.</p>";
                    break;
                case 'fr':
                    echo "<p>Bienvenue sur notre site de jouets! Amusez-vous à explorer nos jouets uniques et amusants.</p>";
                    break;
                default:
                    echo "<p>Welcome to our toy website! Have fun exploring our unique and funny toys.</p>";
            }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
