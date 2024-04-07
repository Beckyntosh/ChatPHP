<?php

$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    job_type VARCHAR(50),
    description TEXT,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$jobTitle = isset($_GET['jobTitle']) ? $_GET['jobTitle'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$jobType = isset($_GET['jobType']) ? $_GET['jobType'] : '';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listings Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        .search-form { margin-bottom: 20px; }
        .job-listing { margin-bottom: 10px; padding: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Job Listings</h1>
        <div class="search-form">
            <form action="" method="GET">
                <input type="text" name="jobTitle" placeholder="Job Title" value="<?php echo $jobTitle; ?>">
                <input type="text" name="location" placeholder="Location" value="<?php echo $location; ?>">
                <select name="jobType">
                    <option value="" <?php echo $jobType === '' ? 'selected' : ''; ?>>Select Job Type</option>
                    <option value="Full-time" <?php echo $jobType === 'Full-time' ? 'selected' : ''; ?>>Full-time</option>
                    <option value="Part-time" <?php echo $jobType === 'Part-time' ? 'selected' : ''; ?>>Part-time</option>
                    <option value="Remote" <?php echo $jobType === 'Remote' ? 'selected' : ''; ?>>Remote</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
        <?php
        $query = "SELECT * FROM job_listings WHERE 1=1 ";
        if ($jobTitle != '') {
            $query .= "AND job_title LIKE '%$jobTitle%' ";
        }
        if ($location != '') {
            $query .= "AND location LIKE '%$location%' ";
        }
        if ($jobType != '') {
            $query .= "AND job_type='$jobType' ";
        }

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='job-listing'>";
                echo "<h2>" . $row['job_title'] . "</h2>";
                echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
                echo "<p><strong>Job Type:</strong> " . $row['job_type'] . "</p>";
                echo "<p>" . $row['description'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No job listings found.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
