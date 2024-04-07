<?php
// PHP backend code for Email Verification System

// Database connection settings
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

// Attempt to establish database connection
try {
    $pdo = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database " . MYSQL_DATABASE . ": " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $verificationCode = sha1(time());

    // Insert user into the database
    $sql = "INSERT INTO users (email, password, verification_code, verified) VALUES (?, ?, ?, 0)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT), $verificationCode])) {
        // Send verification email
        $verifyLink = "http://yourwebsite.com/verify.php?code=" . $verificationCode;
        $subject = "Verify Your Email Address";
        $message = "Please click this link to verify your email address: " . $verifyLink;
        $headers = "From: noreply@yourdomain.com";
        mail($email, $subject, $message, $headers);

        echo "Please check your email to verify your account.";
    } else {
        echo "An error occurred.";
    }
}
?>

HTML Frontend Code for Email Verification System
<!DOCTYPE html>
<html>
<head>
    <title>Signup - Pet Supplies Website</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input[type="email"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h2>Signup to Pet Supplies</h2>
    <form action="" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="signup" value="Signup">
    </form>
</div>

</body>
</html>

Please modify the `http://yourwebsite.com/verify.php` with your actual domain where the verification script resides, and ensure you create the `users` table with columns `email`, `password`, `verification_code`, and `verified` as used in the script.