<?php
// Handle the connection to the database
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $loyalty_member = isset($_POST['loyalty_member']) ? 1 : 0;

    // Encrypt password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into the database
    $sql = "INSERT INTO users (username, email, password, loyalty_member) VALUES ('$username', '$email', '$passwordHash', '$loyalty_member')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Registration successful!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .container {max-width: 400px; margin: auto; padding: 20px;}
        form {display: flex; flex-direction: column;}
        label,input {margin-bottom: 10px;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="loyalty_member">Join the Loyalty Program?</label>
            <input type="checkbox" id="loyalty_member" name="loyalty_member" value="1">
            
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>

**Note for Implementation**: This script assumes that there is a table `users` in the database `my_database` which can store the user's details including `username`, `email`, `password`, and `loyalty_member` status. If this table does not exist, you must create it using a SQL statement similar to:

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  loyalty_member TINYINT NOT NULL
);

Before running the PHP script, ensure that the SQL statement is executed in your MySQL database environment to avoid errors.