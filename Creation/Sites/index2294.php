<?php
// Simple Email Verification Script for Account Signup

// Database connection setup
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

// Create users table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verified BOOLEAN DEFAULT 0,
verification_code VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $verification_code = md5(rand());
  
  // Insert user into database
  $sql = "INSERT INTO users (username, email, password, verification_code)
  VALUES ('$username', '$email', '$password', '$verification_code')";
  
  if ($conn->query($sql) === TRUE) {
    // Send verification email
    $verify_link = "http://yourwebsite.com/verify.php?code=" . $verification_code;
    $subject = "Verify Your Email";
    $message = "Please click this link to verify your email: " . $verify_link;
    $headers = "From: noreply@yourwebsite.com";
    mail($email, $subject, $message, $headers);
    
    echo "Signup successful. Please check your email to verify your account.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { max-width: 300px; margin: auto; }
        input[type=text], input[type=password], input[type=email] { width: 100%; padding: 10px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="psw">Password:</label>
            <input type="password" id="psw" name="password" required>
        </div>
        <button type="submit">Signup</button>
    </form>
</body>
</html>
