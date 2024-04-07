<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database configuration
    $dbServerName = "db";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbName = "my_database";
    
    // Create connection
    $conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $username = $conn->real_escape_string($_POST["username"]);
    $password = password_hash($conn->real_escape_string($_POST["password"]), PASSWORD_DEFAULT);
    $email = $conn->real_escape_string($_POST["email"]);

    // Check if the username or email already exists
    $checkUser = $conn->query("SELECT id FROM users WHERE username='$username' OR email='$email'");
    
    if ($checkUser->num_rows > 0) {
        echo "Username or Email already exists!";
    } else {
        // Insert the new user
        $sql = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $username, $password, $email);
        
        if ($sql->execute()) {
            echo "Signup successful!";
        } else {
            echo "Error: " . $sql->error;
        }
    }
    
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Exclusive Content</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { max-width: 300px; margin: auto; }
        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

<h2>Signup Form for Exclusive Member-Only Content</h2>

<form method="POST">
    <div>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
    </div>
    <div>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
    </div>
    <div>
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>
    </div>
    <button type="submit">Signup</button>
</form>

</body>
</html>
