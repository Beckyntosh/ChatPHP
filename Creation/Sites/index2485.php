<?php
// Assign MySQL connection details
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

// Create table for users if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Sign up process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Encrypt the password
    $enc_password = md5($password);

    // Insert user into table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$enc_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>New record created successfully</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up for Premium Cloud Storage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e68c;
            text-align: center;
        }
        form {
            background-color: #fffafa;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0px 0px 10px grey;
        }
        input[type=text], input[type=password], input[type=email] {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 95%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Sign Up for Access to Premium File Storage Features</h2>

<form action="" method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>
  
  <input type="submit" value="Sign Up">
</form> 

</body>
</html>
