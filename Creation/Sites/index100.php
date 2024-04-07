<?php

// Database connection settings
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

// Fetch job listings based on user input
$search = isset($_POST['search']) ? $_POST['search'] : '';
$locationFilter = isset($_POST['location']) ? $_POST['location'] : '';
$typeFilter = isset($_POST['type']) ? $_POST['type'] : '';

// Build the SQL query with filters
$sql = "SELECT * FROM job_listings WHERE (title LIKE '%$search%' OR description LIKE '%$search%')";
if (!empty($locationFilter)) {
    $sql .= " AND location = '$locationFilter'";
}
if (!empty($typeFilter)) {
    $sql .= " AND type = '$typeFilter'";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablets Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f8ff; color: #333; }
        .container { max-width: 800px; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .job-listing { border-bottom: 1px solid #eee; padding: 10px; margin-bottom: 10px; }
        .job-title { color: #007bff; font-weight: bold; font-size: 20px; }
        .filter-section { margin-bottom: 20px; }
        form > * { margin-right: 10px; margin-bottom: 10px; }
        button { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Find Your Dream Job in Tablets</h2>
    <div class="filter-section">
        <form action="" method="post">
            <input type="text" name="search" placeholder="e.g., remote software creator" value="<?= htmlspecialchars($search) ?>">
            <select name="location">
                <option value="">Any Location</option>
                <option value="Remote" <?= $locationFilter == "Remote" ? 'selected' : '' ?>>Remote</option>
                <option value="On-site" <?= $locationFilter == "On-site" ? 'selected' : '' ?>>On-site</option>
            </select>
            <select name="type">
                <option value="">Any Type</option>
                <option value="Full-time" <?= $typeFilter == "Full-time" ? 'selected' : '' ?>>Full-time</option>
                <option value="Part-time" <?= $typeFilter == "Part-time" ? 'selected' : '' ?>>Part-time</option>
                <option value="Contract" <?= $typeFilter == "Contract" ? 'selected' : '' ?>>Contract</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>
    <?php
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="job-listing">';
            echo '<div class="job-title">' . htmlspecialchars($row["title"]) . '</div>';
            echo '<div>Location: ' . htmlspecialchars($row["location"]) . '</div>';
            echo '<div>Type: ' . htmlspecialchars($row["type"]) . '</div>';
            echo '<p>' . nl2br(htmlspecialchars($row["description"])) . '</p>';
            echo '</div>';
        }
    } else {
        echo "No job listings found.";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
