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

// Check if the table exists, if not create one
$tableCheckSql = "SHOW TABLES LIKE 'job_listings';";
$result = $conn->query($tableCheckSql);

if ($result->num_rows == 0) {
  $createTableSql = "CREATE TABLE job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(100),
    is_remote BOOLEAN DEFAULT false,
    technology VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

  if ($conn->query($createTableSql) === TRUE) {
    echo "Table job_listings created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

$sql = "INSERT INTO job_listings (title, description, location, is_remote, technology)
VALUES ('Software Developer', 'Create cutting-edge software applications.', 'New York', 0, 'PHP'),
       ('Remote Software Engineer', 'Develop and maintain PHP based applications.', 'Remote', 1, 'PHP'),
       ('Backend Developer', 'Focus on server-side logic and integration.', 'California', 0, 'PHP');";

if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$search = $_GET['search'] ?? '';
$location = $_GET['location'] ?? '';
$technology = $_GET['technology'] ?? 'PHP'; // Setting default search technology to PHP

$searchSql = "SELECT id, title, description, location, is_remote, technology FROM job_listings WHERE technology = '$technology'";

if (!empty($search)) {
  $searchSql .= " AND title LIKE '%$search%'";
}

if (!empty($location)) {
  $searchSql .= " AND location = '$location'";
}

$result = $conn->query($searchSql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listings</title>
</head>
<body style="background-color: #f0f0f0; color: #333;">
    <h1>Job Listings</h1>
    <form action="" method="get">
        <input type="text" name="search" placeholder="Job title" value="<?= htmlspecialchars($search) ?>">
        <input type="text" name="location" placeholder="Location" value="<?= htmlspecialchars($location) ?>">
        <input type="hidden" name="technology" value="PHP">
        <button type="submit">Search</button>
    </form>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div><h2>". $row["title"]. "</h2><p>". $row["description"]. "</p>";
            echo "<p>" . ($row["is_remote"] ? "Remote" : "On-site") . " - " . $row["location"]. "</p></div>";
        }
    } else {
        echo "0 results found";
    }
    $conn->close();
    ?>
</body>
</html>
