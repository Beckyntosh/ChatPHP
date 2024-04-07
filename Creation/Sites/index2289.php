<?php
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

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(50) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $conn->real_escape_string($_POST["email"]);
    $token = bin2hex(random_bytes(16)); // generate a token

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if($result->num_rows > 0) {
        echo "Email already exists.";
    } else {
        // Insert the user into the database
        $sql = "INSERT INTO users (email, token, verified) VALUES ('$email', '$token', 0)";
        
        if ($conn->query($sql) === TRUE) {
            // Send verification email
            $to = $email;
            $subject = "Verify your email address";
            $message = "Please click on the link below to verify your email address: \n\n http://yourwebsite.com/verify.php?email=$email&token=$token";
            $headers = "From: noreply@yourwebsite.com";

            if(mail($to, $subject, $message, $headers)) {
                echo "Verification email sent.";
            } else {
                echo "Failed to send verification email.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Herbal Supplements - Signup</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: 0 auto; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup for Herbal Supplements</h2>
        <form action="" method="post">
            <label for="email">Email Address:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <button type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
