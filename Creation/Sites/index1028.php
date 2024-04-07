<?php

// Establish database connection
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

// Create tables if not exists
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

$sqlPasswordReset = "CREATE TABLE IF NOT EXISTS password_reset (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(50) NOT NULL,
token VARCHAR(255) NOT NULL,
expires_at DATETIME NOT NULL
)";

$conn->query($sqlUsers);
$conn->query($sqlPasswordReset);

// Web logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        // User requests password reset
        $email = $conn->real_escape_string($_POST['email']);
        
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
            
        // Set token expiration time
        $expires_at = date("Y-m-d H:i:s", time() + 3600); // 1 hour from now
        
        // Insert into DB
        $sql = "INSERT INTO password_reset (email, token, expires_at) VALUES ('$email', '$token', '$expires_at')";
        
        if ($conn->query($sql) === TRUE) {
            // Send email to user
            $to = $email;
            $subject = "Password Reset for Sunglasses Website";
            $txt = "You requested a password reset. Please click on the following link to reset your password: ";
            $txt .= "http://yourwebsite.com/reset-password.php?token=" . $token;
            $headers = "From: no-reply@yoursunglasseswebsite.com";

            mail($to, $subject, $txt, $headers);
            echo "Password reset link has been sent to your email.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else if (isset($_POST['token']) && isset($_POST['password'])) {
        // User sets a new password
        $token = $conn->real_escape_string($_POST['token']);
        $newPassword = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
        
        // Verify token and expiration
        $sql = "SELECT email, expires_at FROM password_reset WHERE token='$token' LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (new DateTime() < new DateTime($row["expires_at"])) {
                // Update User Password 
                $email = $row["email"];
                $sqlUpdate = "UPDATE users SET password='$newPassword' WHERE email='$email'";
                
                if ($conn->query($sqlUpdate) === TRUE) {
                    // Delete the token so it can't be used again
                    $sqlDelete = "DELETE FROM password_reset WHERE token='$token'";
                    $conn->query($sqlDelete);
                    echo "Password has been updated.";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Token expired.";
            }
        } else {
            echo "Invalid token.";
        }
    }
}

$conn->close();

?>

HTML Form for requesting password reset
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0c040; /*Energetic yellow background*/
            color: #333;
            text-align: center;
            padding: 20px;
        }
        form {
            display: inline-block;
            margin-top: 20px;
        }
        input[type=email], input[type=password], input[type=submit] {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type=submit] {
            color: #fff;
            background-color: #333;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Reset Your Password</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="email" name="email" placeholder="Enter your email ..." required>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
