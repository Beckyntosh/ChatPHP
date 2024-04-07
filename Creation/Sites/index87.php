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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS Jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(50),
    remote ENUM('yes', 'no') DEFAULT 'no',
    technology VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Jobs created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listings</title>
</head>
<body>

<h2>Search Job Listings</h2>
<form action="" method="get">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" placeholder="Position, Technology...">
    <input type="submit" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT id, job_title, description, location, technology FROM Jobs WHERE job_title LIKE ? OR technology LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeSearch = '%' . $search . '%';
    $stmt->bind_param("ss", $likeSearch, $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Job Title</th><th>Description</th><th>Location</th><th>Technology</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["job_title"]."</td><td>".$row["description"]."</td><td>".$row["location"]."</td><td>".$row["technology"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
?>

</body>
</html>

<?php
$conn->close();
?>
