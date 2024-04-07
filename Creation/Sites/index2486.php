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
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($usersTable) === TRUE) {
  // echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Register user
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Insert user
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    $message = "User registered successfully";
  } else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Premium File Storage</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f5f5f5; 
            padding: 20px; 
        }
        .container { 
            background-color: #fff; 
            padding: 20px; 
            width: 300px; 
            margin: 0 auto; 
            border-radius: 5px; 
        }
        input[type="text"], input[type="email"], input[type="password"] { 
            width: 100%; 
            padding: 10px; 
            margin: 10px 0; 
            border: 1px solid #ddd; 
            border-radius: 5px; 
        }
        input[type="submit"] { 
            width: 100%; 
            padding: 10px; 
            border: none; 
            background-color: #007bff; 
            color: white; 
            cursor: pointer; 
            border-radius: 5px; 
        }
        .message {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
        <div class="message"><?php echo $message; ?></div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
