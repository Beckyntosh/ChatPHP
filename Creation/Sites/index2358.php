<?php

*
 * Assuming you have a LAMP (Linux, Apache, MySQL, PHP) stack set up
 * This script uses procedural mysqli
 * IMPORTANT: This is a simplified example. In production, consider security practices
 */

// Database connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(32),
    reg_date TIMESTAMP
)";

if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
}

// Handle user signup
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password'])); // Simplified, consider using password_hash in production

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        $message = "User registered successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup for Exclusive Gardening Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 60%;
            margin: auto;
            padding: 20px;
        }
        input[type='text'], input[type='email'], input[type='password'] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        input[type='submit'] {
            padding: 10px;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type='submit']:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Signup for Access to Exclusive Member-Only Gardening Content</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Signup">
    </form>
    <p><?php echo $message; ?></p>
</div>

</body>
</html>
