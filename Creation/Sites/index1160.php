<?php

// Assumes a database setup with credentials as given, and a basic jobs table structure.
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DB', 'my_database');
define('MYSQL_SERVER', 'db');

function connectToDatabase() {
    try {
        $pdo = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Failed to connect to the database: " . $e->getMessage());
    }
}

function searchJobs($keywords, $pdo) {
    $sql = "SELECT * FROM jobs WHERE position LIKE :keywords AND job_type = 'remote'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['keywords' => '%' . $keywords . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job-listing { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; }
        .job-title { font-size: 20px; color: #333; }
        .job-description { margin-top: 5px; }
    </style>
</head>
<body>

<h2>Search for Remote Software Creator Positions</h2>
<form method="GET">
    <input type="text" name="search" placeholder="Enter keywords">
    <button type="submit">Search</button>
</form>

<?php

if (isset($_GET['search'])) {
    $pdo = connectToDatabase();
    $jobs = searchJobs($_GET['search'], $pdo);

    if (count($jobs) > 0) {
        foreach ($jobs as $job) {
            echo "<div class='job-listing'>";
            echo "<div class='job-title'>" . htmlspecialchars($job['position']) . "</div>";
            echo "<div class='job-description'>" . htmlspecialchars($job['description']) . "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No results found</p>";
    }
}

?>

</body>
</html>
