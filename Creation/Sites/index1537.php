<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data
    $language_title = $_POST['language_title'];
    $vocabulary_list = $_POST['vocabulary_list'];

    // Database configuration
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

    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS language_modules (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(30) NOT NULL,
        vocabulary LONGTEXT,
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Insert the new language module
        $stmt = $conn->prepare("INSERT INTO language_modules (title, vocabulary) VALUES (?, ?)");
        $stmt->bind_param("ss", $language_title, $vocabulary_list);
        
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Language Learning Content</title>
</head>
<body>
    <h2>Spanish for Beginners - Add Vocabulary</h2>
    <form action="" method="post">
        <label for="language_title">Module Title:</label><br>
        <input type="text" id="language_title" name="language_title" required><br>
        <label for="vocabulary_list">Vocabulary List (separate words with commas):</label><br>
        <textarea id="vocabulary_list" name="vocabulary_list" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
