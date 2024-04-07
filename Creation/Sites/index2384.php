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

// Create table for Users if it doesn't exist
$userTable = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($userTable)) {
   echo "Error creating table: " . $conn->error;
}

// Create table for Courses if it doesn't exist
$courseTable = "CREATE TABLE IF NOT EXISTS Courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
courseName VARCHAR(50) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($courseTable)) {
   echo "Error creating table: " . $conn->error;
}

// Sign Up Logic
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Simple encryption for the example

    $sql = "INSERT INTO Users (firstname, lastname, email, password)
    VALUES ('$firstname', '$lastname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "New account created successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Course Enrollment</title>
</head>
<body>

<h2>Sign Up for Online Coding Course</h2>

<form method="post" action="">
    <label for="firstname">First Name:</label><br>
    <input type="text" id="firstname" name="firstname" required><br>
    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" name="signup" value="Sign Up">
</form>

<?php if($message) echo "<p>$message</p>"; ?>

</body>
</html>
