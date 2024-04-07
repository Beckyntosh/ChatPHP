<?php
// Define MySQL connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish connection with the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create a table for job listings if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS job_listings (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100),
    job_type VARCHAR(50),
    category VARCHAR(50),
    posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sqlCreateTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handling the job search with filters
$searchResults = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
    $searchTerm = $conn->real_escape_string($_POST['search']);
    $filterType = isset($_POST['type']) ? $conn->real_escape_string($_POST['type']) : '';
    $filterLocation = isset($_POST['location']) ? $conn->real_escape_string($_POST['location']) : '';

    $sql = "SELECT * FROM job_listings WHERE (title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%')";

    if ($filterType !== '') {
        $sql .= " AND job_type='$filterType'";
    }

    if ($filterLocation !== '') {
        $sql .= " AND location LIKE '%$filterLocation%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clothing Brand Job Listings</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f8f0e3;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff9f0;
            border: 1px solid #f2e5d5;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
        }
        .search-box {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        .search-box input[type="text"],
        .search-box select,
        .search-box input[type="submit"] {
            padding: 10px;
            border: 1px solid #d3c1b1;
            background: #fbf5ee;
            color: #5a4a42;
        }
        .job-listing {
            margin-top: 20px;
        }
        .job {
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #eed9c4;
            background: #fbf5ee;
        }
        .job h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Find Your Next Role in Fashion</h1>
    <form action="" method="post" class="search-box">
        <input type="text" name="search" placeholder="Job title, keywords...">
        <select name="type">
            <option value="">Any type</option>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Remote">Remote</option>
        </select>
        <input type="text" name="location" placeholder="Location">
        <input type="submit" value="Search">
    </form>

    <div class="job-listing">
        <?php if (!empty($searchResults)): ?>
            <?php foreach ($searchResults as $job): ?>
                <div class="job">
                    <h3><?php echo htmlspecialchars($job['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
                    <small>Type: <?php echo htmlspecialchars($job['job_type']); ?> | Location: <?php echo htmlspecialchars($job['location']); ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No jobs found matching your criteria. Please try again.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
