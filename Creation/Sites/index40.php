<?php
// Simple Job Listing Search with Filtering Options

// Database configuration
$servername = "db";
$username   = "root";
$password   = "root";
$dbname     = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS JobListings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    position VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(50),
    type VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchKeyword = $_POST['keyword'] ?? '';
    $searchLocation = $_POST['location'] ?? '';
} else {
    $searchKeyword = '';
    $searchLocation = '';
}

// Search query
$searchQuery = "SELECT * FROM JobListings WHERE position LIKE ? AND location LIKE ?";
$stmt = $conn->prepare($searchQuery);
$searchKeyword = "%$searchKeyword%";
$searchLocation = "%$searchLocation%";
$stmt->bind_param('ss', $searchKeyword, $searchLocation);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .listing { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; }
        .listing h2 { margin: 0 0 10px 0; }
        .listing p { margin: 4px 0; }
    </style>
</head>
<body>
    <h1>Job Search</h1>
    <form method="POST">
        <input type="text" name="keyword" placeholder="Position, e.g., Remote Software Creator" value="<?php echo htmlspecialchars($searchKeyword); ?>" />
        <input type="text" name="location" placeholder="Location, e.g., Remote" value="<?php echo htmlspecialchars($searchLocation); ?>" />
        <button type="submit">Search</button>
    </form>
    
    <div class="results">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="listing">
                    <h2><?php echo htmlspecialchars($row['position']); ?></h2>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                    <p><strong>Type:</strong> <?php echo htmlspecialchars($row['type']); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No job listings found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
