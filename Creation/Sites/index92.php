<?php

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
$sql = "CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    location VARCHAR(100),
    job_type VARCHAR(50),
    experience_level VARCHAR(50),
    description TEXT,
    posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table job_listings created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

function addJobListing($conn, $title, $location, $type, $experience, $description) {
  $stmt = $conn->prepare("INSERT INTO job_listings (job_title, location, job_type, experience_level, description) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $title, $location, $type, $experience, $description);

  $stmt->execute();
  $stmt->close();
}

// Sample data insertion - Uncomment to insert sample data
//addJobListing($conn, "Frontend Developer", "Remote", "Full-time", "Mid-level", "Description here...");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 1200px; margin: auto; padding: 20px; }
        form > div { margin-bottom: 10px; }
        label { display: block; }
        input[type="text"], select { width: 100%; padding: 8px; margin-top: 5px; }
        button { padding: 10px; background-color: blue; color: white; border: none; cursor: pointer; }
        .job-listing { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; }
        .job-listing h3 { margin-top: 0; }
    </style>
</head>
<body>
<div class="container">
    <h1>Job Listings</h1>
    <form action="" method="GET">
        <div>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" placeholder="e.g. Remote" value="<?php echo htmlentities($_GET['location'] ?? ''); ?>">
        </div>
        <div>
            <label for="job_type">Job Type:</label>
            <select id="job_type" name="job_type">
                <option value="">--Select--</option>
                <option value="Full-time" <?php if (($_GET['job_type'] ?? '') === 'Full-time') echo 'selected'; ?>>Full-time</option>
                <option value="Part-time" <?php if (($_GET['job_type'] ?? '') === 'Part-time') echo 'selected'; ?>>Part-time</option>
                <option value="Contract" <?php if (($_GET['job_type'] ?? '') === 'Contract') echo 'selected'; ?>>Contract</option>
            </select>
        </div>
        <div>
            <label for="experience_level">Experience Level:</label>
            <select id="experience_level" name="experience_level">
                <option value="">--Select--</option>
                <option value="Entry-level" <?php if (($_GET['experience_level'] ?? '') === 'Entry-level') echo 'selected'; ?>>Entry-level</option>
                <option value="Mid-level" <?php if (($_GET['experience_level'] ?? '') === 'Mid-level') echo 'selected'; ?>>Mid-level</option>
                <option value="Senior-level" <?php if (($_GET['experience_level'] ?? '') === 'Senior-level') echo 'selected'; ?>>Senior-level</option>
            </select>
        </div>
        <button type="submit">Search</button>
    </form>
    <?php
    
    $sql = "SELECT id, job_title, location, job_type, experience_level, description, posted_at FROM job_listings WHERE 1";
    
    if (!empty($_GET['location'])) {
        $sql .= " AND location LIKE '%" . $conn->real_escape_string($_GET['location']) . "%'";
    }
    
    if (!empty($_GET['job_type'])) {
        $sql .= " AND job_type = '" . $conn->real_escape_string($_GET['job_type']) . "'";
    }
    
    if (!empty($_GET['experience_level'])) {
        $sql .= " AND experience_level = '" . $conn->real_escape_string($_GET['experience_level']) . "'";
    }
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='job-listing'>";
            echo "<h3>" . htmlentities($row['job_title']) . "</h3>";
            echo "<p><strong>Location:</strong> " . htmlentities($row['location']) . "</p>";
            echo "<p><strong>Job Type:</strong> " . htmlentities($row['job_type']) . "</p>";
            echo "<p><strong>Experience Level:</strong> " . htmlentities($row['experience_level']) . "</p>";
            echo "<p>" . nl2br(htmlentities($row['description'])) . "</p>";
            echo "</div>";
        }
    }
    
    $conn->close();
    
    ?>
</div>
</body>
</html>