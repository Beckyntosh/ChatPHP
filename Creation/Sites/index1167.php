<?php
// Simple Job Listing Website with Filters
// Note: This is a very basic example for educational/research purposes and not suitable for production without major improvements, especially in security and scalability.

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

// Check if the table 'jobs' exists, and create it if it does not
$tableCheckQuery = "SHOW TABLES LIKE 'jobs'";
$tableExists = $conn->query($tableCheckQuery);
if ($tableExists->num_rows == 0) {
    // SQL to create table
    $sql = "CREATE TABLE jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(50),
    is_remote BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table Jobs created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Insert example data if not already present
$checkData = "SELECT * FROM jobs";
$result = $conn->query($checkData);
if ($result->num_rows == 0) {
    $insertSql = "INSERT INTO jobs (title, description, location, is_remote) VALUES 
    ('Software Developer', 'Develop amazing software applications.', 'New York', false),
    ('Remote Software Creator', 'Create software from anywhere in the world.', '', true),
    ('Web Designer', 'Design beautiful and functional websites.', 'California', false);";
    
    if ($conn->multi_query($insertSql) === TRUE) {
        echo "Initial data inserted successfully. <br>";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

// Handling the filter submission
$whereClauses = [];
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $conn->real_escape_string($_GET['search']);
    $whereClauses[] = "(title LIKE '%".$searchTerm."%' OR description LIKE '%".$searchTerm."%')";
}

if(isset($_GET['remote']) && $_GET['remote'] == "true") {
    $whereClauses[] = "is_remote = true";
}

$query = "SELECT * FROM jobs";
if (!empty($whereClauses)) {
    $query .= " WHERE " . implode(" AND ", $whereClauses);
}

$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listing with Filters</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job-listing { margin-bottom: 20px; padding: 10px; border: 1px solid #cccccc; }
    </style>
</head>
<body>

<h2>Job Listings</h2>

<form method="GET" action="">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" placeholder="Enter job title or description...">
    <label for="remote">Remote Only:</label>
    <input type="checkbox" id="remote" name="remote" value="true">
    <input type="submit" value="Filter">
</form>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="job-listing">';
        echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
        echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
        echo '<p>Location: ' . ($row["is_remote"] ? 'Remote' : htmlspecialchars($row["location"])) . '</p>';
        echo '</div>';
    }
} else {
    echo "0 results found.";
}
?>

</body>
</html>

<?php
$conn->close();
?>
