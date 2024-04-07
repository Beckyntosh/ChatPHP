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

// Start session
session_start();

// Require logged in user for campaign creation
if(!isset($_SESSION['username'])){
    die("You need to login to view this page");
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['campaign_name'], $_POST['campaign_description'])){
    // Sanitize input
    $name = $conn->real_escape_string($_POST['campaign_name']);
    $description = $conn->real_escape_string($_POST['campaign_description']);

    // Insert campaign into database
    $sql = "INSERT INTO campaigns (name, description) VALUES ('$name', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New campaign created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Garamond', serif;
            background-image: url('bohemian-rhapsody-background.jpg');
            background-size: cover;
            color: #f4a261;
        }

        form {
            padding: 20px;
            background-color: rgba(255,255,255,0.7);
            border-radius: 20px;
            color: #000;
        }

        input[type="text"], textarea {
            width: 100%;
            border: 2px solid #f4a261;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
        }

        input[type="submit"] {
            background-color: #f4a261;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div style="margin: auto; width: 50%;">
    <form action="" method="POST">
        <h1>Create Campaign</h1>
        <input type="text" name="campaign_name" placeholder="Campaign Name" required/><br><br>
        <textarea name="campaign_description" placeholder="Campaign Description" required></textarea><br><br>
        <input type="submit" value="Create Campaign">
    </form>
</div>
</body>
</html>
Before using the code, make sure to replace the placeholders (username, root, and my_database) with your own MySQL username, password, and the name of your actual database, respectively. This application is a self-contained PHP single file application. Please ensure that you properly escape all POST and GET variables in order to protect your application from SQL injection. Also, make the necessary checks to protect the application from Cross-Site Request Forgery (CSRF). The form might need additional elements based on the actual structure of your `campaigns` table. Furthermore, the security measures taken in this application refer to a basic and standard PHP approach and it might not cover all potential security threats that single-file web applications might face. For a production environment, consider implementing a well-established PHP framework (like Laravel or Symfony) as they offer a better structure and stronger security measures.