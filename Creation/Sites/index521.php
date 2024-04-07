<?php

session_start();
header('Content-type: image/jpeg');

$code = rand(1000, 9999);
$_SESSION["captcha"] = $code;

$image = imagecreatefromjpeg("bg.jpg"); // Assume bg.jpg is a background image for captcha
$font = './arial.ttf'; // Assuming you have the Arial font in the same directory
$color = imagecolorallocate($image, 60, 60, 60);
imagettftext($image, 20, 0, 15, 30, $color, $font, $code);
imagejpeg($image);

// Database connection
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

// Create table
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form - Romeo and Juliet Electronics</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('romeo_juliet_bg.jpg'); /* Assume this is a relevant background image */
            color: white;
        }
        .container {
            width: 300px;
            padding: 20px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0,0,0,0.5);
            border-radius: 15px;
        }
        input[type=text], input[type=email], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>
    <form action="register.php" method="post">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" required><br>
        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="captcha">CAPTCHA:</label><br>
        <img src="captcha.php" /><br>
        <input type="text" id="captcha" name="captcha" required><br>
        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>