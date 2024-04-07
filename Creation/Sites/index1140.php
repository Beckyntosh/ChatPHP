<?php

// Database connection
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

// Create job table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(50),
    type VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';

// Search and filter
$sql = "SELECT * FROM jobs WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
if (!empty($type)) {
    $sql .= " AND type='$type'";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; background-color: #f2f2f2; }
        .job-listing { background-color: #fff; padding: 20px; margin-bottom: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .job-listing h3 { margin-top: 0; }
        .search-form, .listings { margin: 20px auto; width: 80%; }
    </style>
</head>
<body>
    <div class="search-form">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Job title or keywords" value="<?= htmlspecialchars($search) ?>">
            <select name="type">
                <option value="">Choose a job type</option>
                <option value="full-time" <?= $type == 'full-time' ? 'selected' : '' ?>>Full-time</option>
                <option value="part-time" <?= $type == 'part-time' ? 'selected' : '' ?>>Part-time</option>
                <option value="remote" <?= $type == 'remote' ? 'selected' : '' ?>>Remote</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="listings">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="job-listing">
                    <h3><?= htmlspecialchars($row['title']) ?></h3>
                    <p><?= htmlspecialchars($row['description']) ?></p>
                    <small>Location: <?= htmlspecialchars($row['location']) ?>, Type: <?= htmlspecialchars($row['type']) ?></small>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No job listings found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
