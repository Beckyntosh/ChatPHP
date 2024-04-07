<?php
// Define MySQL connection data
$MYSQL_HOST = 'db';
$MYSQL_USER = 'root';
$MYSQL_PASSWORD = 'root';
$MYSQL_DBNAME = 'my_database';

// Connect to MySQL database
try {
    $pdo = new PDO("mysql:host=$MYSQL_HOST;dbname=$MYSQL_DBNAME", $MYSQL_USER, $MYSQL_PASSWORD);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Creating a table for financial reports if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    report TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($query);

// Processing form input and sanitizing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchTerm = htmlspecialchars(strip_tags($_POST['search_term']));
    $stmt = $pdo->prepare("SELECT * FROM financial_reports WHERE title LIKE :title");
    $stmt->execute([':title' => "%".$searchTerm."%"]);
    $results = $stmt->fetchAll();
} else {
    $results = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DVDs Financial Reports Search</title>
<style>
    body { font-family: Arial, sans-serif; background-color: #F0DB4F; color: #333; }
    .container { width: 80%; margin: auto; overflow: hidden; }
    header { background: #324D67; color: #F0DB4F; padding-top: 30px; min-height: 70px; border-bottom: #0779E4 3px solid; }
    header h1 { text-align: center; margin: 0; }
    footer { background: #324D67; color: #FFFFFF; text-align: center; padding: 10px; position: fixed; left: 0; bottom: 0; width: 100%; }
    .search-box { display: flex; justify-content: center; padding: 20px; }
    .search-box input[type='text'] { width: 240px; padding: 10px; }
    .search-box input[type='submit'] { padding: 10px; }
    .report { background: #EEE; border: 1px solid #333; padding: 10px; margin-top: 10px; }
</style>
</head>
<body>
<header>
    <h1>Search DVDs Financial Reports</h1>
</header>
<div class="container">
    <div class="search-box">
        <form action="" method="POST">
            <input type="text" name="search_term" placeholder="Search financial reports...">
            <input type="submit" name="search" value="Search">
        </form>
    </div>
    <?php if (!empty($results)): ?>
        <h2>Search Results</h2>
        <?php foreach ($results as $report): ?>
            <div class="report">
                <h3><?php echo $report['title']; ?></h3>
                <p><?php echo $report['report']; ?></p>
                <small>Reported on: <?php echo $report['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>No results found for <strong><?php echo $searchTerm; ?></strong>.</p>
    <?php endif; ?>
</div>
<footer>
    <p>© 2023 DVDs Financial Reports Search</p>
</footer>
</body>
</html>