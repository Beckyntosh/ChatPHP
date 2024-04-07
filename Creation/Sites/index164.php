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

// Create vehicles table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    maintenance_date DATE NOT NULL,
    usage_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$pdo->exec($sql);

// Insert vehicle
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $model = $_POST['model'];
    $maintenance_date = $_POST['maintenance_date'];
    $usage_count = 0;

    $query = "INSERT INTO vehicles (name, model, maintenance_date, usage_count) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $model, $maintenance_date, $usage_count]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle to Fleet</title>
    <style>
        body { background-color: #f0f0f0; font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input[type=text], input[type=date] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; display: inline-block; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
        h2 { text-align: center; color: #333; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Vehicle</h2>
    <form action="" method="post">
        <label for="name">Vehicle Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required>

        <label for="maintenance_date">Maintenance Date:</label>
        <input type="date" id="maintenance_date" name="maintenance_date" required>

        <input type="submit" value="Add Vehicle">
    </form>
</div>

</body>
</html>