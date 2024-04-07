<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user'] = $user;
        header('Location: /products.php');
    } else {
        $message = 'Sorry, those credentials do not match';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {background-color: peachpuff}
        h1   {color: tomato}
        p    {color: olive}
    </style>
</head>
<body>
<h1>Welcome to the Summer Makeup Webshop!</h1>
<h3>Please login to proceed.</h3>

<form method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <input type="submit" value="Submit">
</form>

</body>
</html>