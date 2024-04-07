<?php
// Check if the user is requesting the password reset form or submitting a password reset request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'requestReset') { ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Password Reset</title>
    </head>
    <body>
        <form action="password_reset.php" method="post">
            <input type="email" name="email" required placeholder="Enter your email">
            <button type="submit" name="reset_request">Send Password Reset Link</button>
        </form>
    </body>
    </html>
<?php } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_request'])) {
    // Database connection
    $servername = 'db';
    $username = 'root';
    $password = 'root';
    $dbname = 'my_database';
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Check for email in database and send reset link
    $email = $conn->real_escape_string($_POST['email']);
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(32));
        $url = "http://" . $_SERVER['HTTP_HOST'] . "/password_reset.php?action=reset&token=$token";
        $expires = date("U") + 1800; // Token expires after 30 minutes
        
        // Store token in database
        $conn->query("INSERT INTO password_resets (email, token, expires) VALUES ('$email', '$token', '$expires')");
        
        // Send email
        $to = $email;
        $subject = 'Password Reset for Your Account';
        $message = 'Click on this link to reset your password: ' . $url;
        $headers = 'From: noreply@yourwebsite.com' . "\r\n" .
            'Reply-To: noreply@yourwebsite.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        echo "Password reset link has been sent to your email.";
    } else {
        echo "No account found with that email.";
    }
    $conn->close();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'reset' && isset($_GET['token'])) { ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Password Reset</title>
    </head>
    <body>
        <form action="password_reset.php" method="post">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <input type="password" name="password" required placeholder="Enter new password">
            <input type="password" name="confirm_password" required placeholder="Confirm new password">
            <button type="submit" name="reset_password">Reset Password</button>
        </form>
    </body>
    </html>
<?php } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
    // Database connection
    $servername = 'db';
    $username = 'root';
    $password = 'root';
    $dbname = 'my_database';
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Validate token and reset password
    $token = $conn->real_escape_string($_POST['token']);
    $new_password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $query = "SELECT email, expires FROM password_resets WHERE token='$token' AND expires >= ".date("U");
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $email = $result->fetch_assoc()['email'];
        $conn->query("UPDATE users SET password='$new_password' WHERE email='$email'");
        $conn->query("DELETE FROM password_resets WHERE email='$email'");
        echo "Your password has been updated.";
    } else {
        echo "Invalid or expired token.";
    }
    $conn->close();
} else {
    header('Location: password_reset.php?action=requestReset');
    exit;
}

?>
