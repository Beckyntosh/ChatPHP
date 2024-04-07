<?php
// Variables for connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Create connection
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $couponCode = 'WELCOME10'; // Static coupon for simplicity

    // Insert the new account into the users table
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if($conn->query($sql) === TRUE) {
        // Insert the coupon code into the coupons table for this user
        $userId = $conn->insert_id;
        $sql = "INSERT INTO coupons (user_id, coupon_code) VALUES ('$userId', '$couponCode')";
        
        if($conn->query($sql) === TRUE) {
            echo "Account created successfully. Your coupon code is: ".$couponCode;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup for Desktop Computers</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; }
        .container { max-width: 500px; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        form { margin-top: 20px; }
        input[type="text"], input[type="password"], input[type="submit"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { background-color: #5cb85c; color: white; cursor: pointer; }
        input[type="submit"]:hover { background-color: #4cae4c; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create Account</h2>
    <form method="POST">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Signup">
    </form>
</div>
</body>
</html>
<?php
//Script to create necessary tables if they do not exist
include_once 'config.php'; // Contains MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE, MYSQL_SERVER
// Attempt MySQL server connection.
$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table users query execution
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";
if(mysqli_query($link, $sql)){
    echo "Table users created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Attempt create table coupons query execution
$sql = "CREATE TABLE IF NOT EXISTS coupons (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    coupon_code VARCHAR(20) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
if(mysqli_query($link, $sql)){
    echo "Table coupons created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
