<?php
// Database connection settings
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Check and Create Poll Tables if they don’t exist
$pdo->exec("CREATE TABLE IF NOT EXISTS polls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL
);");

$pdo->exec("CREATE TABLE IF NOT EXISTS poll_options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poll_id INT NOT NULL,
    option_text VARCHAR(255) NOT NULL,
    votes INT NOT NULL DEFAULT 0,
    FOREIGN KEY(poll_id) REFERENCES polls(id) ON DELETE CASCADE
);");

// Insert Poll Data
$question = "Which desktop computer brand do you prefer for digital marketing?";
$options = ["Apple", "Dell", "HP", "Lenovo", "Microsoft"];

// Attempt to find if the poll already exists
$stmt = $pdo->prepare("SELECT id FROM polls WHERE question = ?");
$stmt->execute([$question]);
$pollId = $stmt->fetchColumn();

// If poll doesn't exist, insert it
if (!$pollId) {
    $pdo->prepare("INSERT INTO polls (question) VALUES (?)")->execute([$question]);
    $pollId = $pdo->lastInsertId();
    
    // Insert options
    foreach ($options as $option) {
        $pdo->prepare("INSERT INTO poll_options (poll_id, option_text) VALUES (?, ?)")->execute([$pollId, $option]);
    }
}

// Handling vote submission
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['vote'])) {
    $optionId = $_POST['vote'];
    $stmt = $pdo->prepare("UPDATE poll_options SET votes = votes + 1 WHERE id = ?");
    $stmt->execute([$optionId]);
    echo "<div>Your vote has been submitted. Thank you!</div>";
}

// Retrieve Poll Data
$stmt = $pdo->prepare("SELECT id, option_text FROM poll_options WHERE poll_id = ?");
$stmt->execute([$pollId]);
$options = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote In Poll</title>
    <style>
        body {
            background: #090a0f;
            color: #00ffea;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        .poll-question {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #00ffea;
        }
        .poll-option {
            margin: 10px 0;
        }
        .submit-btn {
            padding: 10px;
            background: #00ffea;
            border: none;
            color: #090a0f;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="poll-question">
                <?= htmlspecialchars($question); ?>
            </div>
            <?php foreach ($options as $option): ?>
                <div class="poll-option">
                    <input type="radio" name="vote" value="<?= $option['id']; ?>" id="option-<?= $option['id']; ?>">
                    <label for="option-<?= $option['id']; ?>"><?= htmlspecialchars($option['option_text']); ?></label>
                </div>
            <?php endforeach; ?>
            <input type="submit" class="submit-btn" value="Submit Vote">
        </form>
    </div>
</body>
</html>