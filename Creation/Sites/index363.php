<?php

// Establish database connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(50) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
)";

if (!$conn->query($tableSql)) {
  echo "Error creating table: " . $conn->error;
}

$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $token = bin2hex(random_bytes(25)); // generate a token
    $sql = "INSERT INTO newsletter_subscribers (email, token) VALUES ('$email', '$token')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $verifyLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]?id=$last_id&token=$token";
        
        // Simulate email sending
        // mail($email, "Confirm your Subscription", "Please click on this link to confirm your subscription: $verifyLink");
        
        $message = "Subscription successful! Please check your email to confirm.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Verify email 
if(isset($_GET['id']) && isset($_GET['token'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $token = $conn->real_escape_string($_GET['token']);
    
    $sql = "SELECT * FROM newsletter_subscribers WHERE id='$id' AND token='$token' LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $updateSql = "UPDATE newsletter_subscribers SET verified=1 WHERE id='$id'";
        if ($conn->query($updateSql)) {
            $message = "Email verified successfully!";
        } else {
            $message = "Error updating record: " . $conn->error;
        }
    } else {
        $message = "Invalid link or ID!";
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
        body {font-family: 'Courier New', monospace; background-color: #f0f0f0;}
        form {margin: 50px auto; width: 300px;}
        input[type="email"] {width: 100%; margin-bottom: 10px;}
        input[type="submit"] {width: 100%;}
    </style>
</head>
<body>
    <form method="POST">
        <h2>Newsletter Signup</h2>
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="submit" value="Subscribe">
    </form>
    <?php
        if($message) {
            echo "<p>$message</p>";
        }
    ?>
</body>
</html>