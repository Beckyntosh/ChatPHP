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

// Create users table
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($createUsersTable) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Create news preferences table
$createNewsPrefTable = "CREATE TABLE IF NOT EXISTS news_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
preference VARCHAR(100) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($createNewsPrefTable) === TRUE) {
    echo "Table news_preferences created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $preferences = $_POST['preferences']; // Expecting comma-separated values
    
    // Password hashing for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $insertUser = "INSERT INTO users (username, password, email)
    VALUES ('$username', '$hashed_password', '$email')";
    
    if ($conn->query($insertUser) === TRUE) {
        $last_id = $conn->insert_id;
        $prefArray = explode(',', $preferences);
        foreach ($prefArray as $preference) {
            $insertPreference = "INSERT INTO news_preferences (user_id, preference)
            VALUES ('$last_id', '$preference')";
            $conn->query($insertPreference);
        }
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertUser . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="preferences">News Feed Preferences (comma-separated, e.g., Football,Basketball,Tennis):</label>
        <input type="text" id="preferences" name="preferences"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
