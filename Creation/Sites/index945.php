<?php
// Database connection settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// User table creation
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    hash VARCHAR(255) NOT NULL,
    UNIQUE (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if(!$link->query($userTable)){
    echo "ERROR: Could not create user table. " . mysqli_error($link);
}


function encryptCookie($data){
    $key = openssl_digest(php_uname(), 'SHA256', TRUE);
    return openssl_encrypt($data, 'AES-256-CBC', $key, 0, substr($key, 0, 16));
}


function decryptCookie($data){
    $key = openssl_digest(php_uname(), 'SHA256', TRUE);
    return openssl_decrypt($data, 'AES-256-CBC', $key, 0, substr($key, 0, 16));
}

// Handle login
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])){
    $username = $link->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT id, hash FROM users WHERE username = '$username'";
    if($result = $link->query($sql)){
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['hash'])){
                // Encrypt and set cookie
                $cookieValue = encryptCookie('user_id=' . $row['id']);
                setcookie("auth", $cookieValue, time() + (86400 * 30), "/"); // 30 days
                echo "<p>Login successful.</p>";
            }else{
                echo "<p>Invalid username or password.</p>";
            }
        }else{
            echo "<p>Invalid username or password.</p>";
        }
    }else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tablets Website</title>
</head>
<body>

<div style="margin: auto; width: 200px;">
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
