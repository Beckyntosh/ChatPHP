<?php
// Connection parameters
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
function createNewsletterTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS newsletter_subscribers (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        token VARCHAR(32) NOT NULL,
        confirmed TINYINT(1) NOT NULL DEFAULT 0,
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table newsletter_subscribers created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

createNewsletterTable($conn);

// Handle newsletter sign up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    $token = md5(uniqid(rand(), true));

    $sql = "INSERT INTO newsletter_subscribers (email, token) VALUES ('$email', '$token')";

    if ($conn->query($sql) === TRUE) {
        $confirmLink = "http://yourdomain.com/confirm.php?email=$email&token=$token";
        $message = "Please click on the following link to confirm your subscription: $confirmLink";
        // Use mail() function to send the email for confirmation
        // mail($email, "Confirm your subscription", $message);

        echo "Please check your email to confirm the subscription.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Email confirmation (normally in a separate file like confirm.php)
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $sql = "UPDATE newsletter_subscribers SET confirmed=1 WHERE email='$email' AND token='$token' AND confirmed=0";

    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "Subscription confirmed. Thank you!";
        } else {
            echo "Subscription could not be confirmed. Please try again.";
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e68c;
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        input[type=email], input[type=submit] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Newsletter Signup</h2>
    <form method="post">
        <input type="email" id="email" name="email" placeholder="Your email" required>
        <input type="submit" value="Subscribe">
    </form>
</div>

</body>
</html>
