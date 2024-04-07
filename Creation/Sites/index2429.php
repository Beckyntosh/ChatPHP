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

// Create user table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create preferences table if not exists
$sql = "CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
preference VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Preferences created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Register user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = $_POST['email'];
  $preference = $_POST['preference'];

  // Insert user
  $sql = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
  $sql->bind_param("sss", $username, $password, $email);
  $sql->execute();
  $user_id = $conn->insert_id;

  // Insert preference
  $sql = $conn->prepare("INSERT INTO preferences (user_id, preference) VALUES (?, ?)");
  $sql->bind_param("is", $user_id, $preference);
  $sql->execute();

  echo "<h3>Registration successful!</h3>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type=text], input[type=email], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        h2 {
          text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>User Registration</h2>
    <form method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="preference">News Feed Preference</label>
        <input type="text" id="preference" name="preference" placeholder="e.g., Makeup Trends" required>

        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>
