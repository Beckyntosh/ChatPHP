<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(50) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $conn->real_escape_string($_POST["email"]);
    $token = bin2hex(random_bytes(25));

    $sql = "INSERT INTO users (email, token) VALUES ('$email', '$token')";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $verifyLink = "http://yourwebsite.com/verify.php?email=$email&token=$token";
        
        mail($email, "Verify Your Email", "Please click on this link to verify your email: $verifyLink");
        echo "Verification email sent. Please check your email.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Kitchenware Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="email"], button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Signup for Kitchenware Website</h2>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Sign Up</button>
    </form>
</div>

</body>
</html>
