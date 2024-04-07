<?php
// Assuming MySQL is configured with default root password as provided in the request
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

// Create tables if they don't exist
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
reg_date TIMESTAMP
)";

$createPreferencesTable = "CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
preference TEXT,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($createUsersTable);
$conn->query($createPreferencesTable);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $preferences = isset($_POST['preferences']) ? $_POST['preferences'] : '';

  // Insert user into the database
  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $user_id = $stmt->insert_id;

  // Insert preferences into the database
  $stmt = $conn->prepare("INSERT INTO preferences (user_id, preference) VALUES (?, ?)");
  $stmt->bind_param("is", $user_id, $preferences);
  $stmt->execute();

  echo "Registration successful!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <style>
        body {
            font-family: 'Ada Lovelace Style', serif;
            background-color: lavender;
        }
        form {
            background-color: white;
            padding: 20px;
            margin: 50px auto;
            width: 300px;
            border: 1px solid #ddd;
        }
        input, textarea {
            margin: 10px 0;
            width: 278px; /* 300 - 22 to adjust padding and border */
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="preferences">Preferences:</label><br>
        <textarea id="preferences" name="preferences"></textarea><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
