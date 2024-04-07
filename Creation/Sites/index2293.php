<?php
session_start();

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

// Create table if doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  verification_code VARCHAR(50),
  verified TINYINT(1) NOT NULL DEFAULT 0,
  reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string(md5($_POST['password']));
    $verification_code = md5(rand(0,1000));
    
    // Insert the user into the database
    $sql = "INSERT INTO users (username, email, password, verification_code)
    VALUES ('$username', '$email', '$password', '$verification_code')";
    
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        // Send email
        $subject = 'Signup | Verification';
        $message = "
        Thanks for signing up!
        Your account has been created, you can login after you have activated your account by pressing the url below.
        Please click this link to activate your account:
        http://yourwebsite.com/verify.php?email=$email&code=$verification_code
        ";
        
        $headers = 'From:noreply@yourwebsite.com' . "\r\n";
        mail($email, $subject, $message, $headers);
        echo "Signup successful. Check your email to activate your account.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Hair Care Products</title>
</head>
<body>
    <h2>Signup for Our Hair Care Products</h2>
    <form method="POST">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Signup">
    </form>
</body>
</html>
