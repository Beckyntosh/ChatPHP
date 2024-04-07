<?php
// Define MySQL connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish connection with the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a jobs table if it doesn't already exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255),
    job_type VARCHAR(100),
    posted_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sqlCreateTable) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handling job search with filters
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchKeyword = isset($_POST['keyword']) ? $conn->real_escape_string($_POST['keyword']) : '';
    $filterType = isset($_POST['type']) ? $conn->real_escape_string($_POST['type']) : '';
    $filterLocation = isset($_POST['location']) ? $conn->real_escape_string($_POST['location']) : '';

    $sql = "SELECT * FROM job_listings WHERE (title LIKE '%$searchKeyword%' OR description LIKE '%$searchKeyword%')";
    if (!empty($filterType)) {
        $sql .= " AND job_type='$filterType'";
    }
    if (!empty($filterLocation)) {
        $sql .= " AND location LIKE '%$filterLocation%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    } else {
        $noResults = true;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skateboard Job Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-control {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: calc(100% - 22px);
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .job-listing {
            margin-top: 20px;
        }
        .job {
            background: #f9f9f9;
            border: 1px solid #e7e7e7;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .job h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Find Your Next Skateboard Industry Job</h1>
    <form action="" method="post">
        <input type="text" name="keyword" placeholder="Search jobs..." class="form-control">
        <select name="type" class="form-control">
            <option value="">Any Type</option>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Remote">Remote</option>
        </select>
        <input type="text" name="location" placeholder="Location..." class="form-control">
        <button type="submit" class="btn">Search</button>
    </form>

    <div class="job-listing">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $job): ?>
                <div class="job">
                    <h2><?php echo htmlspecialchars($job['title']); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
                    <small>Type: <?php echo htmlspecialchars($job['job_type']); ?>, Location: <?php echo htmlspecialchars($job['location']); ?></small>
                </div>
            <?php endforeach; ?>
        <?php elseif (isset($noResults)): ?>
            <p>No job listings match your search.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
