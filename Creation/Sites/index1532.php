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

// SQL to create table
$sqlVocabulary = "CREATE TABLE IF NOT EXISTS vocabulary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
word VARCHAR(50),
translation VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sqlVocabulary) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $language = $_POST['language'];
  $word = $_POST['word'];
  $translation = $_POST['translation'];

  $sqlInsert = "INSERT INTO vocabulary (language, word, translation)
  VALUES ('$language', '$word', '$translation')";

  if ($conn->query($sqlInsert) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sqlInsert . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Language Learning Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
        }
        .container {
            maxWidth: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 15px;
        }

    </style>
</head>
<body>
<div class="container">
    <h2>Add New Vocabulary Item</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="language">Language:</label>
            <select id="language" name="language">
                <option value="Spanish">Spanish</option>
            </select>
        </div>
        <div class="form-group">
            <label for="word">Word:</label>
            <input type="text" id="word" name="word" required>
        </div>
        <div class="form-group">
            <label for="translation">Translation:</label>
            <input type="text" id="translation" name="translation" required>
        </div>
        <input type="submit" value="Add Vocabulary Item">
    </form>
</div>
</body>
</html>
