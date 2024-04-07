<?php
// Connection settings
$mysql_host = 'db';
$mysql_username = 'root';
$mysql_password = 'root';
$mysql_database = 'my_database';

// Create connection
$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    language_preference VARCHAR(5) DEFAULT 'en',
    reg_date TIMESTAMP
)";
if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $language_preference = $_POST['language_preference'];

    $stmt = $conn->prepare("INSERT INTO users (username, email, language_preference) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $language_preference);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup with Language Preference</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="language_preference">Language Preference:</label><br>
  <select name="language_preference" id="language_preference">
    <option value="en">English</option>
    <option value="fr">French</option>
    <option value="de">German</option>
    <option value="es">Spanish</option>
  </select><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
