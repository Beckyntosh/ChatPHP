<?php
// Connection variables
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
$sql = "CREATE TABLE IF NOT EXISTS newsletter_signup (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(64) NOT NULL,
    verified TINYINT NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["email"])) {
    $email = $conn->real_escape_string($_POST["email"]);
    $token = bin2hex(random_bytes(32));

    // Insert into the database
    $sql = "INSERT INTO newsletter_signup (email, token) VALUES ('$email', '$token')";

    if ($conn->query($sql) === TRUE) {
        // Send confirmation email
        $to = $email;
        $subject = 'Confirm Your Email';
        $message = 'Please click on the following link to confirm your subscription: ' .
            'http://yourdomain.com/confirm.php?email=' . $email . '&token=' . $token;
        $headers = 'From: noreply@yourdomain.com' . "\r\n" .
            'Reply-To: noreply@yourdomain.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        echo "A confirmation email has been sent. Please check your inbox.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        input[type=email], input[type=submit] {
            margin-top: 10px;
            padding: 10px;
            width: 95%;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Added for CSS box model consistency */
        }
        input[type=submit] {
            background-color: #5cb85c;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Subscribe to our Newsletter</h2>
    <form method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
