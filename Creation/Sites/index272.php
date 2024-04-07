<?php
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

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$pdo->exec($tableQuery);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'] ?? '';
    $amount = $_POST['amount'] ?? '';

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
    $stmt->execute([$category, $amount]);
    
    echo "<p>Expense Added Successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Expense</title>
</head>
<body>
    <h2>Add Expense to Personal Budget</h2>
    <form action="" method="POST">
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="Food">Food</option>
            <option value="Office Supplies">Office Supplies</option>
            <option value="Utilities">Utilities</option>
            <option value="Miscellaneous">Miscellaneous</option>
        </select><br><br>
        <label for="amount">Amount: $</label>
        <input type="number" id="amount" name="amount" min="1" step="any" required><br><br>
        <input type="submit" value="Add Expense">
    </form>
</body>
</html>
