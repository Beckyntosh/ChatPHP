<?php
// Define MySQL connection details
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

// Establish database connection
$pdo = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD);

// Create tables if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    quarter VARCHAR(50),
    company_type VARCHAR(50),
    content TEXT NOT NULL
)");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    // Handle search
    $searchTerm = '%' . $_POST['search'] . '%';
    $stmt = $pdo->prepare("SELECT * FROM financial_reports WHERE 
        title LIKE ? OR 
        content LIKE ? OR
        CONCAT('Q', quarter, ' earnings reports for ', company_type, ' companies ', year) LIKE ?");
    $stmt->execute([$searchTerm, $searchTerm, $searchTerm]);
    $reports = $stmt->fetchAll();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle submit
    $title = $_POST['title'];
    $year = $_POST['year'];
    $quarter = $_POST['quarter'];
    $company_type = $_POST['company_type'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO financial_reports (title, year, quarter, company_type, content) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $year, $quarter, $company_type, $content]);
    $message = "Report submitted successfully!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Reports</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        form { margin-bottom: 20px; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>
<div class="container">
    <h1>Search and Submit Financial Reports</h1>
    
Search Form
    <form method="post">
        <input type="text" name="search" placeholder="Search for reports...">
        <input type="submit" value="Search">
    </form>

Submit Form
    <form method="post">
        <input type="text" name="title" placeholder="Report Title" required>
        <input type="number" name="year" placeholder="Year" required>
        <input type="text" name="quarter" placeholder="Quarter" required>
        <input type="text" name="company_type" placeholder="Company Type" required>
        <textarea name="content" placeholder="Report Content" required></textarea>
        <input type="submit" value="Submit Report">
        <?php if (!empty($message)) echo "<p>$message</p>"; ?>
    </form>

Reports
    <?php if (!empty($reports)): ?>
        <table>
            <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Quarter</th>
                <th>Company Type</th>
                <th>Content</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($reports as $report): ?>
                <tr>
                    <td><?= htmlspecialchars($report['title']) ?></td>
                    <td><?= htmlspecialchars($report['year']) ?></td>
                    <td><?= htmlspecialchars($report['quarter']) ?></td>
                    <td><?= htmlspecialchars($report['company_type']) ?></td>
                    <td><?= nl2br(htmlspecialchars($report['content'])) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
