<?php

// Database configuration parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establishing connection with the database
$conn = new mysqli($servername, $username, $password, $dbname);
// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(100),
    is_remote BOOLEAN,
    employment_type VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
    die("Error creating table: " . $conn->error);
}

// Handling search
$search = isset($_GET['search']) ? $_GET['search'] : '';
$isRemote = isset($_GET['is_remote']) && $_GET['is_remote'] == 'true' ? true : false;

$searchQuery = "SELECT * FROM jobs WHERE title LIKE ? ";
if ($isRemote) {
    $searchQuery .= " AND is_remote = 1";
}

$stmt = $conn->prepare($searchQuery);
$searchParam = "%" . $search . "%";
$stmt->bind_param("s", $searchParam);

$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; }
        .job-title { font-size: 20px; color: #007BFF; }
        .remote { color: green; }
    </style>
</head>
<body>

    <h1>Job Listings</h1>
    
    <form method="get">
        <input type="text" name="search" placeholder="Search jobs..." value="<?php echo htmlspecialchars($search); ?>">
        <label>
            <input type="checkbox" name="is_remote" value="true" <?php echo $isRemote ? 'checked' : ''; ?>> Remote Only
        </label>
        <button type="submit">Search</button>
    </form>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="job">
            <div class="job-title"><?php echo $row['title']; ?></div>
            <p><?php echo $row['description']; ?></p>
            <small>Location: <?php echo $row['location']; ?></small><br>
            <small>Type: <?php echo $row['employment_type']; ?></small>
            <?php if ($row['is_remote']): ?>
                <div class="remote">Remote</div>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
    
</body>
</html>

<?php
$conn->close();
?>
