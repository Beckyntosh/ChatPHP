<?php
// Define the connection variables
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

// Create table for newsletter with email verification
$sql = "CREATE TABLE IF NOT EXISTS newsletter_signup (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(32) NOT NULL,
    verified BIT DEFAULT 0,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $token = md5(rand());

    $sql = $conn->prepare("INSERT INTO newsletter_signup (email, token) VALUES (?, ?)");
    $sql->bind_param("ss", $email, $token);

    if ($sql->execute()) {
        // Send verification email
        $to = $email;
        $subject = "Confirm your Email";
        $message = "Please click on the link below to confirm your subscription:
        http://yourwebsite.com/confirm_subscription.php?token=$token";
        $headers = "From: noreply@yourartwebsite.com" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        mail($to, $subject, $message, $headers);

        echo "Subscription successful! Please check your email to confirm.";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
}

$conn->close();
?>

HTML Frontend part
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Our Newsletter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0c040;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        form {
            background-color: white;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        input[type=email], button {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
        }
        button {
            cursor: pointer;
            background-color: #333;
            color: white;
        }
        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h2>Sign Up for Our Newsletter</h2>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" name="submit">Subscribe</button>
    </form>
</body>
</html>
