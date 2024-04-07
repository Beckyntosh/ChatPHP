<?php
// Disclaimer: This is a simplified approach for educational purposes.
// In a production environment, separate concerns, refactor for security (e.g., prepared statements), and follow best coding practices.

$conn = new mysqli('db', 'root', 'root', 'my_database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100),
    is_remote BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($table_sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Example insert, in real scenario use prepared statements to prevent SQL injection
$insert_sql = "INSERT INTO jobs (title, description, location, is_remote)
VALUES ('Software Developer', 'Develop amazing software.', 'Anywhere', 1);";
$conn->query($insert_sql);

$search = isset($_GET['search']) ? $_GET['search'] : '';
$is_remote = isset($_GET['is_remote']) ? $_GET['is_remote'] : 0;

$query = "SELECT * FROM jobs WHERE title LIKE ? AND is_remote = ?";
$stmt = $conn->prepare($query);
$search_term = "%$search%";
$stmt->bind_param("si", $search_term, $is_remote);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Listings</title>
</head>
<body>
    <h1>Find Your Dream Job</h1>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Job title" value="<?= htmlspecialchars($search) ?>"/>
        <label for="is_remote">Remote Only</label>
        <input type="checkbox" name="is_remote" value="1" <?= $is_remote ? 'checked' : '' ?>/>
        <input type="submit" value="Search"/>
    </form>

    <?php if ($result->num_rows > 0): ?>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <h2><?= htmlspecialchars($row['title']) ?></h2>
                    <p><?= htmlspecialchars($row['description']) ?></p>
                    <p>Location: <?= htmlspecialchars($row['location']) ?> | Remote: <?= $row['is_remote'] ? 'Yes' : 'No' ?></p>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No job listings found.</p>
    <?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
