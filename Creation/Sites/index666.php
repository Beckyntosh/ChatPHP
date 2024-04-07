<?php

$host = "db";
$db = "my_database";
$user = "root";
$pass = "root";

$dsn = "mysql:host=$host;dbname=$db";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


if (isset($_POST['send_message'])) {
    $receiver = $_POST['to'];
    $message = $_POST['message'];

    $stmt = $pdo->prepare("INSERT INTO messages (receiver, content) VALUES (?, ?)");
    $stmt->execute([$receiver, $message]);
    
    echo "Message sent succeeded";
}

$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();
?>

<html>
<head>
    <title>Forest Fantasy themed website</title>
    <style>
        body {
            background-image: url('forest_image.jpg'); 
        }
        .direct-message {
            background-color: green;
            color: white;
            font-family: fantasy;
        }
    </style>
</head>
<body>
    <div class="direct-message">
        <form method="post">
            <label for="to">To:</label>
            <select name="to">
                <?php foreach($users as $user): ?>
                <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="message">Message:</label>
            <textarea name="message"></textarea>
            <button type="submit" name="send_message">Send Message</button>
        </form>
    </div>
</body>
</html>