<?php
// Establishing the connection to the MySQL database
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

// Create the Job Listings table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description TEXT,
    is_remote BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle the search request
$search = isset($_POST['search']) ? $_POST['search'] : '';
$is_remote = isset($_POST['is_remote']) ? $_POST['is_remote'] : 0;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 0 auto; width: 90%; }
        .job { margin-bottom: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        .job-title { font-size: 20px; color: #333; }
        .job-description { margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Job Listings</h1>
        <form method="POST">
            <input type="text" name="search" placeholder="Search for jobs..." value="<?php echo $search; ?>">
            <label>
                <input type="checkbox" name="is_remote" value="1" <?php if($is_remote) echo 'checked'; ?>> Remote only
            </label>
            <button type="submit">Search</button>
        </form>
        <div class="job-listings">
            <?php
            // Construct the search query
            $sql = "SELECT * FROM job_listings WHERE title LIKE '%$search%' ";
            if ($is_remote) {
                $sql .= "AND is_remote = 1 ";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output each job listing
                while($row = $result->fetch_assoc()) {
                    echo '<div class="job">';
                    echo '<div class="job-title">'. $row["title"]. '</div>';
                    echo '<div class="job-description">'. $row["description"]. '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results found";
            }
            ?>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
