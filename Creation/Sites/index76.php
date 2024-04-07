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

// Fetch job listings based on user input
$search = isset($_POST['search']) ? $_POST['search'] : '';
$filters = isset($_POST['filters']) ? $_POST['filters'] : [];

// Build the SQL query with filters
$sql = "SELECT * FROM job_listings WHERE position LIKE '%$search%'";
foreach ($filters as $key => $value) {
    $sql .= " AND $key = '$value'";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Supplies Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; }
        .job-listing { border-bottom: 1px solid #eee; padding: 10px; }
        .job-title { color: #007bff; }
        .filter-section { margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Job Listings for Art Supplies</h2>
    <div class="filter-section">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Search job titles..." value="<?= $search ?>">
            <select name="filters[type]">
                <option value="">Select Type</option>
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="remote">Remote</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="job-listing">';
            echo '<div class="job-title">' . $row["title"] . '</div>';
            echo '<div>Type: ' . $row["type"] . '</div>';
            echo '<div>Location: ' . $row["location"] . '</div>';
            echo '</div>';
        }
    } else {
        echo "No job listings found.";
    }
    ?>
</div>
</body>
</html>
<?php
$conn->close();
?>
