<?php
// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(100),
    type VARCHAR(50),
    category VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Search and filter functionality
$results = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search = $conn->real_escape_string($_POST['search']);
    $type = isset($_POST['type']) ? $conn->real_escape_string($_POST['type']) : '';
    $location = isset($_POST['location']) ? $conn->real_escape_string($_POST['location']) : '';

    $sql = "SELECT * FROM jobs WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

    if (!empty($type)) {
        $sql .= " AND type LIKE '%$type%'";
    }

    if (!empty($location)) {
        $sql .= " AND location LIKE '%$location%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        .search-form { margin-bottom: 20px; }
        .search-form input, .search-form select { padding: 10px; margin-right: 5px; }
        .search-form button { padding: 10px; }
        .job-listing { margin-top: 20px; }
        .job { padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>

<div class="container">
    <h1>Job Search</h1>
    <form action="" method="post" class="search-form">
        <input type="text" name="search" placeholder="Search for jobs...">
        <select name="type">
            <option value="">Any Type</option>
            <option value="Full-Time">Full-Time</option>
            <option value="Part-Time">Part-Time</option>
            <option value="Remote">Remote</option>
        </select>
        <input type="text" name="location" placeholder="Location...">
        <button type="submit">Search</button>
    </form>

    <div class="job-listing">
        <?php foreach ($results as $job): ?>
            <div class="job">
                <h2><?php echo htmlspecialchars($job['title']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
                <p><strong>Type:</strong> <?php echo htmlspecialchars($job['type']); ?></p>
                <p><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
