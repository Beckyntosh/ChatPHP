<?php
// Basic single-file PHP web application for a Job Listing Search with Filters
// Note: This is a simple example and not suitable for production without proper security and validation implementations.

//Database Connection
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

// Creating table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) NOT NULL,
    description TEXT,
    type VARCHAR(50),
    location VARCHAR(100),
    is_remote BOOLEAN DEFAULT false,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert dummy data - only once, you might want to remove this part after first execution
$dummyData = [
    ['title' => 'Senior PHP Developer', 'description' => 'Remote senior PHP developer needed.', 'type' => 'Full-time', 'location' => 'Remote', 'is_remote' => true],
    // Add more data as required
];

foreach ($dummyData as $data) {
    $stmt = $conn->prepare("INSERT INTO job_listings (title, description, type, location, is_remote) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $data['title'], $data['description'], $data['type'], $data['location'], $data['is_remote']);
    $stmt->execute();
}

// Searching
$search = isset($_GET['search']) ? $_GET['search'] : '';
$isRemote = isset($_GET['is_remote']) ? $_GET['is_remote'] : '';

$query = "SELECT * FROM job_listings WHERE title LIKE ? OR description LIKE ?";
if($isRemote) {
    $query .= " AND is_remote = 1";
}

$stmt = $conn->prepare($query);

$searchWildCard = "%$search%";
$stmt->bind_param("ss", $searchWildCard, $searchWildCard);
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
.container { max-width: 600px; margin: auto; }
.job { border: 1px solid #eee; padding: 10px; border-radius: 5px; margin-bottom: 10px; }
</style>
</head>
<body>
<div class="container">
    <h2>Job Search</h2>
    <form>
        <input type="text" name="search" placeholder="Keyword" value="<?= htmlspecialchars($search) ?>">
        <label>
            <input type="checkbox" name="is_remote" value="1" <?= $isRemote ? 'checked' : '' ?>> Remote Only
        </label>
        <button type="submit">Search</button>
    </form>
    <?php if ($result->num_rows > 0) : ?>
        <?php while($row = $result->fetch_assoc()) : ?>
            <div class="job">
                <h3><?= htmlspecialchars($row["title"]) ?></h3>
                <p><?= htmlspecialchars($row["description"]) ?></p>
                <small>Type: <?= htmlspecialchars($row["type"]) ?> | Location: <?= htmlspecialchars($row["location"]) ?></small>
                <?php if($row["is_remote"]): ?>
                    <br><strong>Remote Position</strong>
                <?php endif; ?>
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
