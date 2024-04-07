<?php

// Database configuration
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

// Creating table if not exists
$sql = "CREATE TABLE IF NOT EXISTS job_listing (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    job_type VARCHAR(50) NOT NULL,
    location VARCHAR(100),
    remote BOOLEAN DEFAULT false,
    keywords TEXT,
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["search"];
    $remote = isset($_POST["remote"]) ? 1 : 0;
    
    // SQL query to search for jobs
    $sql = "SELECT * FROM job_listing WHERE title LIKE ? OR keywords LIKE ? ";
    if ($remote) {
        $sql .= "AND remote = 1";
    }
    
    $stmt = $conn->prepare($sql);
    $search_param = "%$search%";
    $stmt->bind_param("ss", $search_param, $search_param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM job_listing");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Listings</title>
    <style>
        body { font-family: "Trebuchet MS", Arial, sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { text-align: left; padding: 8px; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Job Search</h2>
    <form method="POST">
        <input type="text" name="search" placeholder="e.g., Software Developer"/>
        <label>
            <input type="checkbox" name="remote"/> Remote only
        </label>
        <input type="submit" value="Search"/>
    </form>

    <br/>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Type</th>
            <th>Location</th>
            <th>Date Posted</th>
        </tr>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["title"]."</td>
                            <td>".$row["description"]."</td>
                            <td>".$row["job_type"]."</td>
                            <td>".$row["location"]."</td>
                            <td>".$row["post_date"]."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No results found</td></tr>";
            }
        ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>
