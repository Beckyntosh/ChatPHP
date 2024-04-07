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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS LanguageModules (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
module_name VARCHAR(50) NOT NULL,
language VARCHAR(50),
content TEXT,
reg_date TIMESTAMP)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $moduleName = $_POST["moduleName"];
  $language = $_POST["language"];
  $content = $_POST["content"];

  $stmt = $conn->prepare("INSERT INTO LanguageModules (module_name, language, content) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $moduleName, $language, $content);

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
<title>Add Language Learning Content</title>
<style>
  body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
  .container { max-width: 600px; margin: 30px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
  form { display: flex; flex-direction: column; }
  input[type=text], textarea { margin-bottom: 20px; padding: 10px; }
  input[type=submit] { cursor: pointer; }
</style>
</head>
<body>
<div class="container">
  <h2>Add Language Learning Content</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="moduleName">Module Name:</label>
    <input type="text" id="moduleName" name="moduleName" required>

    <label for="language">Language:</label>
    <input type="text" id="language" name="language" required>

    <label for="content">Content (vocabulary list, etc.):</label>
    <textarea id="content" name="content" rows="10" required></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
</body>
</html>
