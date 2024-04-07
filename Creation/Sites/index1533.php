<?php
// DB Connection params
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

// Create table for language modules if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    language VARCHAR(30) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($table_sql) === TRUE) {
  // echo "Table language_modules created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["title"]) && isset($_POST["language"]) && isset($_POST["content"])) {
    $title = $_POST["title"];
    $language = $_POST["language"];
    $content = $_POST["content"];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO language_modules (title, language, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $language, $content);
    
    // Execute
    if ($stmt->execute() === TRUE){
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Language Module</title>
</head>
<body>
    <h2>Add Language module</h2>
    <form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="language">Language:</label><br>
        <input type="text" id="language" name="language" required><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
