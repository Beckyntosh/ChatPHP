<?php

// Connection Parameters
define("MYSQL_SERVERNAME", "db");
define("MYSQL_USERNAME", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DB", "my_database");

// Create connection
$conn = new mysqli(MYSQL_SERVERNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
$filter_job_type = isset($_POST["job_type"]) ? $_POST["job_type"] : '';
$filter_keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';


function sanitizeInput($data, $conn) {
    return htmlspecialchars(stripslashes(trim($conn->real_escape_string($data))));
}

// Sanitize inputs
$filter_job_type = sanitizeInput($filter_job_type, $conn);
$filter_keyword = sanitizeInput($filter_keyword, $conn);

// SQL Query with WHERE clause based on user input
$sql = "SELECT id, title, description, type, location FROM jobs WHERE type LIKE '%$filter_job_type%' AND (title LIKE '%$filter_keyword%' OR description LIKE '%$filter_keyword%')";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Supplies Job Board</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; }
        .container { width: 80%; margin: auto; }
        .job-listing { border-bottom: 1px solid #eee; padding: 20px; }
        .job-title { font-weight: bold; }
        .job-type { font-style: italic; }
    </style>
</head>
<body>

<div class="container">
    <h1>Art Supplies Job Board</h1>
    <form method="POST" action="">
        <input type="text" name="keyword" placeholder="Keyword (e.g., remote software creator)" value="<?= htmlspecialchars($filter_keyword); ?>">
        <select name="job_type">
            <option value="">Select Job Type</option>
            <option value="full-time" <?= $filter_job_type === "full-time" ? "selected" : "" ?>>Full-time</option>
            <option value="part-time" <?= $filter_job_type === "part-time" ? "selected" : "" ?>>Part-time</option>
            <option value="remote" <?= $filter_job_type === "remote" ? "selected" : "" ?>>Remote</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='job-listing'>";
            echo "<div class='job-title'>{$row["title"]}</div>";
            echo "<div class='job-description'>{$row["description"]}</div>";
            echo "<div class='job-type'>Type: {$row["type"]}</div>";
            echo "<div class='job-location'>Location: {$row["location"]}</div>";
            echo "</div>";
        }
    } else {
        echo "No results found.";
    }
    ?>

</div>

</body>
</html>

<?php
$conn->close();
?>
