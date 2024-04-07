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

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = 'SELECT * FROM users WHERE username="'.$user.'" AND password="'.md5($pass).'" LIMIT 1';
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        echo 'Login successful! Welcome, '.$user;
    } else {
        echo 'Login failed! Check your credentials.';
    }
}

echo '<!DOCTYPE html>
<html>
<head>
    <title>Christmas Makeup Shop</title>
    <style>
		body { background-color: #ff8a80;}
        .login { margin: 0 auto; width: 300px; height: 180px; padding: 10px; background-color: #fff; }
		.login input { margin: 5px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Login to Christmas Makeup Shop</h2>
    <div class="login">
        <form method="post" action="login.php">
            <label>Username:</label>
            <input type="text" name="username"/><br/>
            <label>Password:</label>
            <input type="password" name="password"/><br/>
            <input style="margin-left:70px;" type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>';
$conn->close();
?>