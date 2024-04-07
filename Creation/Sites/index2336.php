<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection parameters
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Create tables if they don't exist
    $sqlUsers = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(50) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(50),
        reg_date TIMESTAMP
    )";

    $sqlEvents = "CREATE TABLE IF NOT EXISTS registrations (
        reg_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED,
        event_name VARCHAR(50) NOT NULL,
        registration_date TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )";

    if (!$con->query($sqlUsers) || !$con->query($sqlEvents)) {
        echo "Error creating table: " . $con->error;
    }

    // Escape user inputs for security
    $fullname = $con->real_escape_string($_POST['fullname']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    // Ideally, you should hash the password. For brevity, we store it plain.
    // Please implement password hashing in your real application
    
    // Attempt insert query execution
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
    
    if($con->query($sql)){
        echo "Account created successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . $con->error;
    }

    // Close connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration</title>
</head>
<body style="text-align: center;">
    <h2>Sign Up for Our Webinar</h2>
    <form action="" method="post">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
