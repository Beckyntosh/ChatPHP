
<?php
session_start();
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['action'])) {
    if ($_POST['action'] === "requestReset") {
        $email = $conn->real_escape_string($_POST['email']);
        $token = bin2hex(random_bytes(32));
        $expires = date("U") + 1800; // 30 minutes from now

        $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?);";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sss", $email, $token, $expires);
            $stmt->execute();
            $stmt->close();

            $to = $email;
            $subject = "Password Reset Request";
            $message = '<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
            $message .= '<p>Here is your password reset link: </br>';
            $message .= '<a href="http://yourwebsite.com/reset.php?email=' . $email . '&token=' . $token . '">Reset your password</a></p>';

            $headers = "From: noreply@yourwebsite.com\r\n";
            $headers .= "Reply-To: noreply@yourwebsite.com\r\n";
            $headers .= "Content-type: text/html\r\n";

            mail($to, $subject, $message, $headers);
            echo "Reset link sent to your email!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else if ($_POST['action'] === "resetPassword") {
        $email = $conn->real_escape_string($_POST['email']);
        $token = $conn->real_escape_string($_POST['token']);
        $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
        $currentDate = date("U");

        $sql = "SELECT * FROM pwdReset WHERE pwdResetEmail=? AND pwdResetToken=? AND pwdResetExpires>=?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sss", $email, $token, $currentDate);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $sql = "UPDATE users SET password=? WHERE email=?;";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("ss", $password, $email);
                    $stmt->execute();
                    $stmt->close();

                    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                    $stmt = $conn->prepare($sql);
                    if ($stmt) {
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $stmt->close();
                    }
                    echo "Your password has been updated!";
                }
            } else {
                echo "This token is invalid or has expired.";
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Your Password</title>
</head>
<body>
<h2>Reset Your Password</h2>
<form method="POST">
    <input type="hidden" name="action" value="requestReset">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <button type="submit">Request Reset Link</button>
</form>

<h2>Enter New Password</h2>
<form method="POST">
    <input type="hidden" name="action" value="resetPassword">
    <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : ''; ?>">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">New Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Reset Password</button>
</form>
</body>
</html>
<?php
}
$conn->close();
?>
