<?php
// Simple Code Review System
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS code_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) die("Error creating table: " . $conn->error);

function saveCodeSubmission($conn, $title, $code) {
    $stmt = $conn->prepare("INSERT INTO code_submissions (title, code) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $code);
    $stmt->execute();
    $stmt->close();
}

function fetchCodeReviews($conn) {
    $sql = "SELECT id, title, submitted_at FROM code_submissions ORDER BY submitted_at DESC";
    return $conn->query($sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['code']) && isset($_POST['title'])) {
    saveCodeSubmission($conn, $_POST['title'], $_POST['code']);
}

$reviews = fetchCodeReviews($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Review System</title>
</head>
<body>
    <h1>Upload Code for Review</h1>
    <form action="" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="code">Code:</label><br>
        <textarea id="code" name="code" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Submitted Reviews</h2>
    <ul>
        <?php while($row = $reviews->fetch_assoc()): ?>
            <li>
                <strong><?= htmlspecialchars($row['title']) ?></strong> - <?= $row['submitted_at'] ?><br>
                <pre><?= htmlspecialchars($row['code']) ?></pre>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
<?php
$conn->close();
?>
