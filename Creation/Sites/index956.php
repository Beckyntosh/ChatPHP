<?php

// Simple encryption/decryption code for a feedback form in a travel website context

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

// Create feedback table with encryption if doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    encrypted_message TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Function to simple encrypt a message
function encrypt_message($message, $secret_key = 'simplekey') {
    return openssl_encrypt($message, 'AES-128-ECB', $secret_key);
}

// Function to simple decrypt a message
function decrypt_message($encrypted_message, $secret_key = 'simplekey') {
    return openssl_decrypt($encrypted_message, 'AES-128-ECB', $secret_key);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["feedback"])) {
    $encrypted_message = encrypt_message($_POST["feedback"]);

    // Insert encrypted feedback into user_feedback table
    $stmt = $conn->prepare("INSERT INTO user_feedback (encrypted_message) VALUES (?)");
    $stmt->bind_param("s", $encrypted_message);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error submitting feedback: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: 'Lucida Grande', 'Lucida Sans Unicode', Tahoma, Sans-Serif;
            padding: 20px;
            background-color: #f4f7f6;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #003d7a;
        }
    </style>
</head>
<body>

<h2>User Feedback Form</h2>

<form method="post" action="">

  <label for="feedback">Your Feedback:</label><br>
  <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br><br>

  <input type="submit" value="Submit Feedback">

</form>

</body>
</html>
