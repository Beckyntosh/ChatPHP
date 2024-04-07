<?php

// Define MySQL connection
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
$sql = "CREATE TABLE IF NOT EXISTS LanguageModule (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
level VARCHAR(30),
vocab_list TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $language = $_POST['language'];
  $level = $_POST['level'];
  $vocabList = $_POST['vocabList'];

  $sql = "INSERT INTO LanguageModule (language, level, vocab_list) VALUES (?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $language, $level, $vocabList);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vocabulary List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px 0 #dddddd;
        }
        input[type=text], textarea {
            width: 100%;
            padding: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Vocabulary List</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="language">Language</label>
            <input type="text" id="language" name="language" placeholder="Spanish">

            <label for="level">Level</label>
            <input type="text" id="level" name="level" placeholder="Beginner">

            <label for="vocabList">Vocabulary List (comma-separated)</label>
            <textarea id="vocabList" name="vocabList" placeholder="hello,world,..." style="height:200px"></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
