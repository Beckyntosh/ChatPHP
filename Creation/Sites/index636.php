<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // check username and password in the database
    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    // If result matched $username and $password, table row must be 1 row
    if ($count == 1) {
        header("Location: products.php");
        exit;
    }else {
        echo "Your Login Name or Password is invalid";
    }
}

mysqli_close($conn);
?>

<html>
<head>
    <style>
        body {background-color: #FF7034;}
    </style>
</head>

<body>
    <div id="login">
        <h2>Login Form</h2>
        <form action="" method="post">
            <label>UserName :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</body>
</html>