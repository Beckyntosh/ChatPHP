<?php
// Connection Parameters (using PDO)
$host = 'db';
$dbname = 'my_database';
$username = 'root';
$password = 'root';
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Create tables if not exists
$query = <<<SQL
CREATE TABLE IF NOT EXISTS tech_companies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    q2_earnings_report TEXT NOT NULL,
    year YEAR NOT NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
SQL;

$pdo->exec($query);

// Search functionality
$searchResult = '';

if (isset($_POST['search'])) {
    $year = 2023; // Hardcoded year as per example
    $searchString = '%' . $_POST['search'] . '%';

    $stmt = $pdo->prepare("SELECT name, q2_earnings_report FROM tech_companies WHERE q2_earnings_report LIKE :searchString AND year = :year");
    $stmt->execute(['searchString' => $searchString, 'year' => $year]);
    $results = $stmt->fetchAll();

    if ($results) {
        foreach ($results as $row) {
            $searchResult .= '<div><h3>' . htmlspecialchars($row['name']) . '</h3><p>' . nl2br(htmlspecialchars($row['q2_earnings_report'])) . '</p></div>';
        }
    } else {
        $searchResult = '<div>No results found for your search query.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Reports Search</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px #ccc;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #5a5959;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #484747;
        }
        .search-results {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Q2 Earnings Reports for Tech Companies</h1>
        <form action="" method="post">
            <input type="text" name="search" placeholder="Enter keyword e.g., 'sales increase'" required>
            <input type="submit" value="Search">
        </form>
        <div class="search-results">
            <?php echo $searchResult; ?>
        </div>
    </div>
</body>
</html>
