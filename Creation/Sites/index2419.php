<?php
// Subscription Service Signup with Trial Period for a Furniture Website

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

// Create users table if not exists
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    trial_start DATE,
    trial_end DATE,
    reg_date TIMESTAMP
)";

if ($conn->query($createUsersTable) === TRUE) {
    echo ""; // Success, but echo nothing.
} else {
    echo "Error creating table: " . $conn->error;
}


// Sign Up User
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    // Passwords should be hashed in a real application
    $password = md5($_POST['password']);

    $trial_start = date("Y-m-d");
    $trial_end = date('Y-m-d', strtotime('+1 month', strtotime($trial_start)));

    $signupQuery = "INSERT INTO users (fullname, email, password, trial_start, trial_end)
    VALUES ('$fullname', '$email', '$password', '$trial_start', '$trial_end')";

    if ($conn->query($signupQuery) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $signupQuery . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Furniture Subscription Service</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 500px; margin: auto; padding: 20px; }
        input[type="text"], input[type="email"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h2>Signup for a Free 1-Month Trial</h2>
    <form method="post" action="">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Sign Up">
    </form>
</div>

</body>
</html>
