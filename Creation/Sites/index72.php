<?php

// Simple job search web application including frontend and MySQL database connection

// Establish MySQL database connection
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

// Create job listings table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS job_listings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(150),
    is_remote BOOLEAN DEFAULT false,
    category VARCHAR(100)
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle search on form submission
$search = '';
$isRemote = false;
$location = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $isRemote = isset($_POST['is_remote']) ? true : false;
    $location = $_POST['location'];

    // Sanitize input
    $search = htmlspecialchars($search);
    $location = htmlspecialchars($location);
}

// Generate SQL query based on search
$sql = "SELECT * FROM job_listings WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
if ($isRemote) {
    $sql .= " AND is_remote=1";
}
if (!empty($location)) {
    $sql .= " AND location='$location'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listing Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h2>Job Search</h2>

    <form action="" method="post">
        <input type="text" name="search" placeholder="Search for jobs..." value="<?php echo $search; ?>">
        <input type="checkbox" name="is_remote" id="is_remote" <?php echo $isRemote ? 'checked' : ''; ?>>
        <label for="is_remote">Remote positions only</label>
        <input type="text" name="location" placeholder="Location..." value="<?php echo $location; ?>">
        <input type="submit" value="Search">
    </form>

    <h3>Job Listings</h3>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='job'>";
            echo "<h4>" . $row["title"] . "</h4>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<p><strong>Location:</strong> " . ($row["is_remote"] ? "Remote" : $row["location"]) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No jobs found matching your criteria.</p>";
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>
