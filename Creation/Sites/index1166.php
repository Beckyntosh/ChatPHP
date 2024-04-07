<?php
// Simple single-file job search and filter application for demonstration purposes.

// Connection variables
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create jobs table if it does not exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100),
    type ENUM('full-time', 'part-time', 'remote') NOT NULL,
    category ENUM('software', 'customer support', 'design', 'marketing') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableQuery)) {
    die("Error creating table: " . $conn->error);
}

$search = isset($_POST['search']) ? $_POST['search'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';

// Form, Filter, and Search
echo '<form method="POST">
        <input type="text" name="search" placeholder="Job title or keyword" value="'.htmlentities($search).'">
        <select name="type">
            <option value="">Select Job Type</option>
            <option value="full-time" '.($type == "full-time" ? "selected" : "").'>Full-time</option>
            <option value="part-time" '.($type == "part-time" ? "selected" : "").'>Part-time</option>
            <option value="remote" '.($type == "remote" ? "selected" : "").'>Remote</option>
        </select>
        <select name="category">
            <option value="">Select Category</option>
            <option value="software" '.($category == "software" ? "selected" : "").'>Software</option>
            <option value="customer support" '.($category == "customer support" ? "selected" : "").'>Customer Support</option>
            <option value="design" '.($category == "design" ? "selected" : "").'>Design</option>
            <option value="marketing" '.($category == "marketing" ? "selected" : "").'>Marketing</option>
        </select>
        <button type="submit">Search</button>
      </form>';

// Search and filter logic
$query = "SELECT * FROM jobs WHERE title LIKE ? ";
$params = ["%$search%"];

if (!empty($type)) {
    $query .= " AND type = ? ";
    $params[] = $type;
}

if (!empty($category)) {
    $query .= " AND category = ? ";
    $params[] = $category;
}

$stmt = $conn->prepare($query);
$stmt->bind_param(str_repeat('s', count($params)), ...$params);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output the results
    while($row = $result->fetch_assoc()) {
        echo "<div><h2>".htmlspecialchars($row['title'])."</h2>
        <p>".nl2br(htmlspecialchars($row['description']))."</p>
        <p>Type: ".htmlspecialchars($row['type'])." | Category: ".htmlspecialchars($row['category'])."</p></div>";
    }
} else {
    echo "<p>No job listings found.</p>";
}

// Close connection
$conn->close();
?>
Given the varied nature of projects and the specific requirements they may entail, this script is a basic illustration and should be refined and tested further to meet specific security, scalability, or functionality needs, especially when deploying on a real-world application.