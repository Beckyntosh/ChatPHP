<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='
    $password'";

    $results = mysqli_query($conn, $query);

    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        header('location: index.php');
    } else {
        echo "Wrong username/password combination";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Winter Makeup Shop - Login</title>
<style>
body {
    background-color: #f0f8ff;
    font-family: Arial, Helvetica, sans-serif;
}
.container {
    width: 300px;
    padding: 16px;
    background-color: white;
    margin: 0 auto;
    margin-top: 100px;
    border: 1px solid black;
    border-radius: 4px;
}
</style>
</head>
<body>
    <div class="container">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" name="login">Login</button>
    </div>

</body>
</html>