<?php
// Simple Craft Beer Comparison Tool in PHP (Single-file approach)

// Define MySQL connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL database
$pdo = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// Create the tables if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS beers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(100),
    abv FLOAT,
    description TEXT,
    image_url VARCHAR(255)
)");

$pdo->exec("CREATE TABLE IF NOT EXISTS comparisons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    beer1_id INT,
    beer2_id INT,
    FOREIGN KEY (beer1_id) REFERENCES beers(id),
    FOREIGN KEY (beer2_id) REFERENCES beers(id)
)");

// Handle POST request for comparison
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compare'])) {
    $beer1_id = $_POST['beer1_id'];
    $beer2_id = $_POST['beer2_id'];
    
    if ($beer1_id && $beer2_id) {
        // Insert comparison
        $stmt = $pdo->prepare("INSERT INTO comparisons (beer1_id, beer2_id) VALUES (?, ?)");
        $stmt->execute([$beer1_id, $beer2_id]);
        
        $message = 'Comparison saved successfully!';
    } else {
        $message = 'Please select two beers to compare.';
    }
}

// Fetch beers for form dropdown
$stmt = $pdo->query("SELECT * FROM beers");
$beers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Craft Beer Comparison Tool</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .beer-list { margin-bottom: 20px; }
        .comparison-result { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Craft Beer Comparison Tool</h1>
    <form method="POST">
        <div class="beer-list">
            <label for="beer1">Beer 1:</label>
            <select name="beer1_id" id="beer1">
                <option value="">Select a Beer</option>
                <?php foreach ($beers as $beer): ?>
                    <option value="<?= htmlspecialchars($beer['id']) ?>"><?= htmlspecialchars($beer['name']) ?></option>
                <?php endforeach; ?>
            </select>
            vs.
            <label for="beer2">Beer 2:</label>
            <select name="beer2_id" id="beer2">
                <option value="">Select a Beer</option>
                <?php foreach ($beers as $beer): ?>
                    <option value="<?= htmlspecialchars($beer['id']) ?>"><?= htmlspecialchars($beer['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="compare">Compare</button>
    </form>
    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
</body>
</html>
