<?php
// Define variables for database connection
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_DATABASE", "my_database");

// Establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create members table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";
if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle sign up
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insert = "INSERT INTO members (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
    if ($conn->query($insert) === TRUE) {
        echo "New record created successfully";
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
    <title>Signup for Exclusive Content - Home Decor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light sky blue background */
            color: #333; /* Main text color */
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff; /* White background for the form */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow around the form */
        }
        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px; /* Rounded borders around the input fields */
            box-sizing: border-box; /* Makes sure padding doesn't affect the overall width */
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50; /* Green background */
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px; /* Rounded borders for the submit button */
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049; /* Darker shade of green for hover effect */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Signup for Exclusive Home Decor Content</h2>
    <p>Join our community to gain access to exclusive member-only articles and videos.</p>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="Signup">
    </form>
</div>

</body>
</html>
