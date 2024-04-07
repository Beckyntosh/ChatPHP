<?php
// Check if request method is POST for signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'signup') {
    // Database configuration
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $email = $_POST['email'];
        
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM subscribers WHERE email = ?");
        $stmt->execute([$email]);
        if($stmt->rowCount() > 0) {
            echo "Email already subscribed.";
        } else {
            // Insert into database
            $token = bin2hex(random_bytes(50)); // generate a token
            $stmt = $conn->prepare("INSERT INTO subscribers (email, token, confirmed) VALUES (?, ?, 0)");
            $stmt->execute([$email, $token]);
        
            // Send confirmation email
            $confirmLink = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?token=".$token."&action=confirm";
            $to = $email;
            $subject = "Confirm Your Subscription";
            $message = "Please click this link to confirm your subscription: ".$confirmLink;
            $headers = "From: noreply@yourwebsite.com";
            mail($to, $subject, $message, $headers);
            
            echo "Subscription successful. Please check your email to confirm.";
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'confirm' && isset($_GET['token'])) {
    // Confirm the email subscription
    $token = $_GET['token'];
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("UPDATE subscribers SET confirmed = 1 WHERE token = ?");
        $stmt->execute([$token]);
        
        if($stmt->rowCount() > 0) {
            echo "Email confirmed successfully.";
        } else {
            echo "Invalid or expired token.";
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    // Frontend Form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Signup</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f3f3f3; text-align: center; }
        .signup-form { background-color: #fff; padding: 20px; margin-top: 50px; display: inline-block; }
        .input-field { margin: 10px 0; }
        .submit-btn { padding: 10px 25px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="signup-form">
        <h2>Subscribe to Our Newsletter</h2>
        <form action="" method="post">
            <div class="input-field">
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <input type="hidden" name="action" value="signup">
            <div class="input-field">
                <input type="submit" class="submit-btn" value="Subscribe">
            </div>
        </form>
    </div>
</body>
</html>
<?php
}
?>
