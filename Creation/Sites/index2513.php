<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection variables
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

    // SQL to create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    preferred_language VARCHAR(50),
    reg_date TIMESTAMP
    )";

    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Escape user inputs for security
    $username = $conn->real_escape_string($_REQUEST['username']);
    $email = $conn->real_escape_string($_REQUEST['email']);
    $preferred_language = $conn->real_escape_string($_REQUEST['preferred_language']);
    
    // Attempt insert query execution
    $sql = "INSERT INTO users (username, email, preferred_language) VALUES ('$username', '$email', '$preferred_language')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Welcome, $username! Your account has been created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    
    <label for="preferred_language">Preferred Language:</label><br>
    <select id="preferred_language" name="preferred_language">
        <option value="English">English</option>
        <option value="Spanish">Spanish</option>
        <option value="French">French</option>
        <option value="German">German</option>
    </select><br><br>
    
    <input type="submit" value="Submit">
</form>

</body>
</html>
