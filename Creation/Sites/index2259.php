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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $sql = "INSERT INTO subscribers (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Thanks for signing up for product updates!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up for Product Updates</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 300px; margin: auto; margin-top: 50px; }
        input[type=email], button { width: 100%; padding: 10px; margin-top: 5px; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up for Product Updates</h2>
        <form action="" method="post">
            <input type="email" name="email" required placeholder="Enter your email">
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
