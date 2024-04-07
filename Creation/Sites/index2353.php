<?php
// Define database connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(30),
    reg_date TIMESTAMP
)";
if (!$conn->query($tableCreationQuery)) {
    die("Error creating table: " . $conn->error);
}

$msg = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Check if user already exists
    $checkUser = "SELECT * FROM users WHERE username = '$username' OR email='$email'";
    $result = $conn->query($checkUser);
    if ($result && $result->num_rows > 0) {
        $msg = "User already exists!";
    } else {
        // Insert the new user
        $insertUser = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$passwordHash')";
        if ($conn->query($insertUser) === TRUE) {
            $msg = "Registered successfully. Please log in.";
        } else {
            $msg = "Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up for Exclusive Content</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 20px;
}
.wrapper {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}
h2, p {
    text-align: center;
}
form {
    margin-top: 20px;
}
input[type="text"], input[type="email"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    box-sizing: border-box; /* Added for better input sizing */
}
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #05c46b;
    color: #fff;
    border: none;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #039a55;
}
.msg {
    color: red;
    text-align: center;
}
</style>
</head>
<body>
<div class="wrapper">
    <h2>Sign Up for Access to Exclusive Content</h2>
    <p>Please fill in this form to create an account and get exclusive access.</p>
    <form action="signup.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="signup" value="Sign Up">
    </form>
    <?php if(!empty($msg)): ?>
        <p class="msg"><?= $msg ?></p>
    <?php endif; ?>
</div>
</body>
</html>
<?php $conn->close(); ?>
