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

function getUser($pdo, $userId) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$userId]);
    return $stmt->fetch();
}

function sendMessage($pdo, $fromUser, $toUser, $message) {
    $stmt = $pdo->prepare('INSERT INTO messages (fromUser, toUser, message) VALUES (?, ?, ?)');
    $stmt->execute([$fromUser, $toUser, $message]);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $fromUser = getUser($pdo, $_POST['fromUser']);
    $toUser = getUser($pdo, $_POST['toUser']);
    $message = $_POST['message'];
    sendMessage($pdo, $fromUser['id'], $toUser['id'], $message);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Herbal Supplements Technology and Gadget Review Site</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #202020;
        color: #FFF;
    }
    .message-box {
        background-color: #505050;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border-radius=5px;
    }
    </style>
</head>
<body>
    <div class="message-box">
        <form method="POST">
            <label for="fromUser">From:</label><br>
            <input type="text" id="fromUser" name="fromUser"><br>
            <label for="toUser">To:</label><br>
            <input type="text" id="toUser" name="toUser"><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message"></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>