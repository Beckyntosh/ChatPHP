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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(32) NOT NULL,
confirmed TINYINT(1) NOT NULL DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];
    $token = md5($email . time()); // Generate a unique token
    $sql = $conn->prepare("INSERT INTO subscribers (email, token) VALUES (?, ?)");
    $sql->bind_param("ss", $email, $token);
    
    if ($sql->execute()) {
        // Prepare email
        $to = $email;
        $subject = "Confirm Your Subscription";
        $message = "Please click on the following link to confirm your subscription: 
        http://yourwebsite.com/confirm.php?token=" . $token;
        $headers = "From: no-reply@yourpetssupplieswebsite.com" . "\r\n" .
                   "Reply-To: no-reply@yourpetssupplieswebsite.com" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        // Send email
        mail($to, $subject, $message, $headers);
        echo "Please check your email to confirm your subscription.";
    } else {
        echo "Error subscribing: " . $conn->error;
    }
} elseif (isset($_GET["token"])) {
    $token = $_GET["token"];
    $sql = $conn->prepare("UPDATE subscribers SET confirmed = 1 WHERE token = ?");
    $sql->bind_param("s", $token);
    if ($sql->execute()) {
        echo "Subscription confirmed. Thank you!";
    } else {
        echo "Error confirming subscription.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Subscribe to Our Newsletter</title>
</head>
<body style="font-family: Arial, sans-serif; text-align: center; background-color: #f0ebe4; color: #333;">
    <h2>Sign Up for Our Exclusive Newsletter</h2>
    <form action="" method="post">
        <input type="email" name="email" required="required" placeholder="Enter your email address" style="padding: 10px; width: 250px; margin-bottom: 10px;">
        <br>
        <button type="submit" style="cursor: pointer; padding: 10px 20px; background-color: #8a6841; color: white; border: none;">Subscribe</button>
    </form>
</body>
</html>