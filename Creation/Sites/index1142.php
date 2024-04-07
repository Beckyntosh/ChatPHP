<?php
// Simple database connection
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
$sql = "CREATE TABLE IF NOT EXISTS jobs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(50) NOT NULL,
  description TEXT,
  location ENUM('remote', 'onsite'),
  technology VARCHAR(30),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Frontend part
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $location = $_POST['location'];
    $technology = $_POST['technology'];

    $sql = "SELECT * FROM jobs WHERE title LIKE '%$search%' AND location='$location' AND technology='$technology'";
    $result = $conn->query($sql);

    echo "<h2>Job Search Results:</h2>";

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div>
                    <h3>" . $row["title"]. "</h3>
                    <p>" . $row["description"]. "</p>
                    <p><strong>Technology:</strong> " . $row["technology"] . "</p>
                    <p><strong>Location:</strong> " . $row["location"] . "</p>
                  </div>";
        }
    } else {
        echo "<p>No job matches your search criteria.</p>";
    }
} else {
    echo "<h2>Search for Job Listings</h2>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Listings Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        input, select { margin: 5px 0; }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="search" placeholder="Search for jobs..." required>
        <select name="location">
            <option value="remote">Remote</option>
            <option value="onsite">Onsite</option>
        </select>
        <select name="technology">
            <option value="PHP">PHP</option>
            <option value="" disabled>Select Technology</option>
        </select>
        <button type="submit">Search</button>
    </form>
</body>
</html>
