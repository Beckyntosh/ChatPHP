<?php

$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Create connection
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    type VARCHAR(30) NOT NULL,
    location VARCHAR(50) DEFAULT 'remote',
    keywords TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($tableQuery) === TRUE) {
    //echo "Table job_listings created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle the search
$search = isset($_GET['search']) ? $_GET['search'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : 'remote';

$searchQuery = "SELECT * FROM job_listings WHERE title LIKE ? AND location=? AND type LIKE ?";
$stmt = $conn->prepare($searchQuery);
$likeSearch = "%".$search."%";
$likeType = "%".$type."%";
$stmt->bind_param("sss", $likeSearch, $location, $likeType);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job-listing { margin-bottom: 20px; padding: 20px; border: 1px solid #ccc; }
        .job-title { font-weight: bold; }
    </style>
</head>
<body>

<h2>Search for Job Listings</h2>
<form action="" method="GET">
    <label for="search">Job Title/Description: </label>
    <input type="text" id="search" name="search">
    <label for="type">Type: </label>
    <input type="text" id="type" name="type">
    <label for="location">Location:</label>
    <select id="location" name="location">
        <option value="remote">Remote</option>
        <option value="onsite">On-site</option>
    </select>
    <button type="submit">Search</button>
</form>

<?php if ($result->num_rows > 0): ?>
    <h3>Job Listings</h3>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="job-listing">
            <div class="job-title"><?php echo $row["title"]; ?></div>
            <div><?php echo $row["description"]; ?></div>
            <div>Type: <?php echo $row["type"]; ?></div>
            <div>Location: <?php echo $row["location"]; ?></div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No job listing found</p>
<?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
