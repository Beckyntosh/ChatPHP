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

// Check if the table exists, create if not
$checkTable = "CREATE TABLE IF NOT EXISTS retirement_savings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    current_age INT NOT NULL,
    retirement_age INT NOT NULL,
    monthly_income DECIMAL(10,2) NOT NULL,
    savings_goal DECIMAL(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$pdo->exec($checkTable);

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_age = $_POST['current_age'];
    $retirement_age = $_POST['retirement_age'];
    $monthly_income = $_POST['monthly_income'];

    $years_to_save = $retirement_age - $current_age;
    $monthly_savings_needed = ($monthly_income * 12 * $years_to_save) / ($years_to_save * 12);

    // Insert into table
    $sql = "INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_goal) VALUES (?, ?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$current_age, $retirement_age, $monthly_income, $monthly_savings_needed]);

    $message = "You need to save $$monthly_savings_needed a month to reach your retirement goal.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Retirement Savings Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #A2D9CE;
            color: #154360;
            padding: 20px;
        }
        .container {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 15px;
        }
        input[type=number], button {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #154360;
            border-radius: 5px;
        }
        button {
            background-color: #58D68D;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45B39D;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Retirement Savings Calculator</h2>
    <form method="post">
        <label for="current_age">Current Age:</label><br>
        <input type="number" id="current_age" name="current_age" required><br>
        <label for="retirement_age">Desired Retirement Age:</label><br>
        <input type="number" id="retirement_age" name="retirement_age" required><br>
        <label for="monthly_income">Desired Monthly Income at Retirement:</label><br>
        <input type="number" id="monthly_income" name="monthly_income" step="0.01" required><br>
        <button type="submit">Calculate</button>
    </form>
    <p><?= $message; ?></p>
</div>
</body>
</html>