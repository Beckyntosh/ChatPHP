<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection settings
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
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(50),
        preferences TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

    if (!$conn->query($sql) === TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Escaping user inputs
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $preferences = $conn->real_escape_string(json_encode($_POST['preferences']));

    // Inserting data into users table
    $sql = "INSERT INTO users (username, email, password, preferences) VALUES ('$username', '$email', '$password', '$preferences')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration for Customizable News Feed</title>
</head>
<body>

<h2>User Registration</h2>

<form method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>

    <label for="preferences">News Feed Preferences:</label><br>
    <input type="checkbox" id="sports" name="preferences[sports]" value="Sports">
    <label for="sports"> Sports</label><br>

    <input type="checkbox" id="technology" name="preferences[technology]" value="Technology">
    <label for="technology"> Technology</label><br>

    <input type="checkbox" id="entertainment" name="preferences[entertainment]" value="Entertainment">
    <label for="entertainment"> Entertainment</label><br>

    <input type="submit" value="Register">
</form> 

</body>
</html>
