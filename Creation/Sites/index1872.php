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

// Create users table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  isActive BOOLEAN DEFAULT false,
  activationCode VARCHAR(64),
  reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  // echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Signup form processing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // collect value of input field
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $activationCode = md5($email.time()); // Create unique activation code
    
    $sql = "INSERT INTO users (username, email, password, activationCode)
    VALUES ('$username', '$email', '$password', '$activationCode')";
    
    if ($conn->query($sql) === TRUE) {
        $to = $email;
        $subject = "Email Verification";
        $message = "Please click on this link to activate your account: 
        http://yourdomain.com/verify.php?email=$email&code=$activationCode";
        $headers = "From: noreply@yourdomain.com";
        
        mail($to,$subject,$message,$headers);
        
        echo "Verification link has been sent to your email.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Email verification
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["email"]) && isset($_GET["code"])) {
    $email = $_GET["email"];
    $code = $_GET["code"];
    
    $sql = "SELECT * FROM users WHERE email='$email' AND activationCode='$code'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Update user activity
        $update = "UPDATE users SET isActive = true WHERE email='$email'";
        
        if ($conn->query($update) === TRUE) {
            echo "Account activated successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid activation code.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>SignUp Form with Email Verification</title>
</head>
<body>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="signup" value="Sign Up">
    </form>
</body>
</html>

<?php
$conn->close();
?>
