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

// Create table for language modules if it does not exist
$table_sql = "CREATE TABLE IF NOT EXISTS language_modules (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
level VARCHAR(30) NOT NULL,
vocabulary TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  // echo "Table language_modules created successfully"; // Disabled for a single-file no-placeholder approach
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted to add a vocabulary list
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $language = $_POST['language'];
    $level = $_POST['level'];
    $vocabulary = $_POST['vocabulary'];

    $insert_sql = "INSERT INTO language_modules (language, level, vocabulary)
    VALUES ('$language', '$level', '$vocabulary')";

    if ($conn->query($insert_sql) === TRUE) {
      echo "<script>alert('New record created successfully');</script>";
    } else {
      echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Language Learning Content Creation</title>
</head>
<body>
    <h2>Add a Vocabulary List - Spanish for Beginners</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="language">Language:</label><br>
        <input type="text" id="language" name="language" value="Spanish"><br>
        <label for="level">Level:</label><br>
        <input type="text" id="level" name="level" value="Beginner"><br>
        <label for="vocabulary">Vocabulary (comma-separated):</label><br>
        <textarea id="vocabulary" name="vocabulary" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
