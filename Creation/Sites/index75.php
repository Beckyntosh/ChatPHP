<?php
// Define MySQL connection parameters
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

// Establish connection
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}

// Creates the jobs table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100) NOT NULL,
    is_remote BOOLEAN DEFAULT false,
    keywords VARCHAR(255),
    added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $location = $_POST['location'] ?? '';
    $is_remote = isset($_POST['is_remote']) ? 1 : 0;
    $keywords = $_POST['keywords'] ?? '';

    $insertSql = "INSERT INTO jobs (title, description, location, is_remote, keywords) VALUES (?, ?, ?, ?, ?)";

    if($stmt = $conn->prepare($insertSql)) {
        $stmt->bind_param("sssds", $title, $description, $location, $is_remote, $keywords);
        $stmt->execute();
        $stmt->close();
    } else {
        die("Error preparing statement: " . $conn->error);
    }
}

// Querying the jobs
$search = $_GET['search'] ?? '';
$query = "SELECT * FROM jobs WHERE title LIKE ? OR keywords LIKE ?";
$stmt = $conn->prepare($query);
$likeSearch = "%$search%";
$stmt->bind_param("ss", $likeSearch, $likeSearch);
$stmt->execute();
$result = $stmt->get_result();
$jobs = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Search - Sherlock Holmes Style</title>
</head>
<body>
    <h1>Find Your Dream Job</h1>
    <form method="GET">
        <input type="text" name="search" placeholder="Search for jobs...">
        <input type="submit" value="Search">
    </form>
    <h2>Job Listings</h2>
    <?php foreach ($jobs as $job): ?>
        <div>
            <h3><?= htmlspecialchars($job['title']) ?></h3>
            <p><?= htmlspecialchars($job['description']) ?></p>
            <p>Location: <?= htmlspecialchars($job['location']) ?> <?= $job['is_remote'] ? '(Remote)' : '' ?></p>
            <p>Keywords: <?= htmlspecialchars($job['keywords']) ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
