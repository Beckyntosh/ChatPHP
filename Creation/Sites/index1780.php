<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for users
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  verification_code VARCHAR(50),
  is_verified BOOLEAN NOT NULL DEFAULT FALSE,
  reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $verification_code = md5(rand());

    $sql = "INSERT INTO users (username, email, verification_code) VALUES ('$username', '$email', '$verification_code')";

    if ($conn->query($sql) === TRUE) {
        $subject = "Account Verification";
        $message = "Please click on the Link below to verify your account. 
        \n http://{$_SERVER['HTTP_HOST']}/verify.php?email={$email}&code={$verification_code}";
        mail($email, $subject, $message, "From: no-reply@mysportinggoodswebsite.com");

        echo "Verification email sent.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Verification script
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["code"])) {
    $email = $_GET["email"];
    $code = $_GET["code"];

    $sql = "SELECT * FROM users WHERE email='$email' AND verification_code='$code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "UPDATE users SET is_verified=true WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            echo "Account verified successfully!";
        } else {
            echo "Error verifying account: " . $conn->error;
        }
    } else {
        echo "Invalid verification link or account already verified.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Verification</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        <input type="submit" value="Signup">
    </form>
</body>
</html>
