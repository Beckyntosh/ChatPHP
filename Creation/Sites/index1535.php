<?php
// Connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create language module table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    vocabulary TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $vocabulary = $_POST['vocabulary'];

    $stmt = $conn->prepare("INSERT INTO language_modules (title, vocabulary) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $vocabulary);

    if($stmt->execute()) {
        echo "<p style='color: green;'>Module created successfully.</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Language Learning Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0a0b0e;
            color: #66fcf1;
            font-size: 16px;
        }
        input[type=text], textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #45a29e;
            border-radius: 4px;
            background-color: #1f2833;
            color: #66fcf1;
        }
        input[type=submit] {
            width: 100%;
            background-color: #45a29e;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #66fcf1;
            color: #0b0c10;
        }
        .container {
            width: 50%;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a new Language Module</h2>
        <form method="POST" action="">
            <label for="title">Module Title:</label>
            <input type="text" id="title" name="title" placeholder="Spanish for Beginners">

            <label for="vocabulary">Vocabulary List:</label>
            <textarea id="vocabulary" name="vocabulary" placeholder="hola=hello,gracias=thank you,por favor=please" style="height:200px"></textarea>

            <input type="submit" value="Create Module">
        </form>
    </div>
</body>
</html>
