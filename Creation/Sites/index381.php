<?php
session_start();

$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Creating a connection
$conn = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the table if it doesn't exist
$tables = "CREATE TABLE IF NOT EXISTS users (
             id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
             username VARCHAR(30) NOT NULL,
             password VARCHAR(40) NOT NULL,
             email VARCHAR(50),
             reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

if ($conn->query($tables) === TRUE) {
    //echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$message = '';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $username, $password, $email);
        
        if ($stmt->execute()) {
            $message = 'Account successfully created';
        } else {
            $message = 'Error while creating account';
        }
    } else {
        $message = 'Error preparing statement';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; }
        .container { max-width: 400px; margin: auto; padding: 20px; background-color: #ffffff; border: 1px solid #dee2e6; border-radius: 5px; margin-top: 20px; }
        input[type=text], input[type=password], input[type=email] { width: 100%; padding: 15px;margin: 5px 0 22px 0;display: inline-block;border: none;background: #f1f1f1; }
        input[type=text]:focus, input[type=password]:focus, input[type=email]:focus { background-color: #ddd;outline: none; }
        hr { border: 1px solid #f1f1f1;margin-bottom: 25px; }
        .registerbtn { background-color: #4CAF50;color: white;padding: 16px 20px;margin: 8px 0;border: none;cursor: pointer;width: 100%;opacity: 0.9; }
        .registerbtn:hover { opacity: 1; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup for Webinar</h2>
        <p>Please fill in this form to create an account and register for the event.</p>
        <hr>
        <form action="" method="post">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <hr>
            <button type="submit" class="registerbtn" name="register">Register</button>
        </form>
        <?php if ($message != ''): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>