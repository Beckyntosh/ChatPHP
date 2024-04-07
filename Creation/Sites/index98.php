<?php
// Define MYSQL connection credentials
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Create connection
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Jobs Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(50),
    type ENUM('full-time', 'part-time', 'remote') DEFAULT 'full-time',
    category ENUM('Software', 'Design', 'Customer Support', 'Finance', 'Marketing') DEFAULT 'Software',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Function to escape form input
function cleanInput($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
    return $data;
}

// Handle the job search
$search = '';
$type = '';
$category = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = cleanInput($_POST['search'], $conn);
    $type = cleanInput($_POST['type'], $conn);
    $category = cleanInput($_POST['category'], $conn);

    $sql = "SELECT * FROM jobs WHERE (title LIKE '%$search%' OR description LIKE '%$search%')";
    if (!empty($type)) {
        $sql .= " AND type='$type'";
    }
    if (!empty($category)) {
        $sql .= " AND category='$category'";
    }
} else {
    $sql = "SELECT * FROM jobs";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Job Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            margin-bottom: 20px;
        }

        .job {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .job-title {
            font-size: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Job Search</h1>
    <form action="" method="post">
        <input type="text" name="search" placeholder="Search for jobs..." value="<?= $search ?>">
        <select name="type">
            <option value="">Select Type</option>
            <option value="full-time" <?= $type == 'full-time' ? 'selected' : '' ?>>Full-time</option>
            <option value="part-time" <?= $type == 'part-time' ? 'selected' : '' ?>>Part-time</option>
            <option value="remote" <?= $type == 'remote' ? 'selected' : '' ?>>Remote</option>
        </select>
        <select name="category">
            <option value="">Select Category</option>
            <option value="Software" <?= $category == 'Software' ? 'selected' : '' ?>>Software</option>
            <option value="Design" <?= $category == 'Design' ? 'selected' : '' ?>>Design</option>
            <option value="Customer Support" <?= $category == 'Customer Support' ? 'selected' : '' ?>>Customer Support</option>
            <option value="Finance" <?= $category == 'Finance' ? 'selected' : '' ?>>Finance</option>
            <option value="Marketing" <?= $category == 'Marketing' ? 'selected' : '' ?>>Marketing</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <?php if ($result->num_rows > 0) : ?>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="job">
                <div class="job-title"><?= $row["title"] ?></div>
                <div><?= $row["description"] ?></div>
                <div>Type: <?= $row["type"] ?>, Category: <?= $row["category"] ?></div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No job listings found.</p>
    <?php endif; ?>
</body>

</html>

<?php
$conn->close();
?>
