<?php
// Declare connection variables
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

// Create tables if not exist
$sql = "CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    language VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $language = $_POST['language'];
    $content = $_POST['content'];
    
    $stmt = $conn->prepare("INSERT INTO language_modules (title, language, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $language, $content);
    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f9;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        input[type=text], textarea {
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
    </style>
</head>
<body>

<h2>Add Language Learning Content</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="title">Title</label>
  <input type="text" id="title" name="title" placeholder="Module title...">

  <label for="language">Language</label>
  <input type="text" id="language" name="language" placeholder="Language...">

  <label for="content">Content</label>
  <textarea id="content" name="content" placeholder="Write the module content here..." style="height:200px"></textarea>

  <input type="submit" value="Submit">
</form>

</body>
</html>
