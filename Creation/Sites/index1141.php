<?php
// Connect to database
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

// Create table if it does not exist
$tableSql = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255),
    is_remote BOOLEAN DEFAULT FALSE,
    category VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($tableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission for new jobs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $is_remote = isset($_POST['is_remote']) ? 1 : 0;
    $category = $_POST['category'];

    $insertSql = "INSERT INTO jobs (title, description, location, is_remote, category)
    VALUES ('$title', '$description', '$location', $is_remote, '$category')";

    if ($conn->query($insertSql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

$query = "SELECT * FROM jobs WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
if ($filter === "remote") {
    $query .= " AND is_remote=1";
}

$result = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listings</title>
    <style>
        .job {
            border: 1px solid #333;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body style="font-family: 'Ken Thompson', sans-serif;">
    <h1>Job Listings</h1>

    <form method="GET">
        <input type="text" name="search" placeholder="Search for jobs..." value="<?php echo $search; ?>">
        <select name="filter">
            <option value="">Select Filter</option>
            <option value="remote" <?php if ($filter === "remote") echo "selected"; ?>>Remote</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <div>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='job'>";
                echo "<h2>" . $row["title"]. "</h2>";
                echo "<p>" . $row["description"]. "</p>";
                echo "<p><strong>Location: </strong>" . ($row["is_remote"] ? "Remote" : $row["location"]) . "</p>";
                echo "<p><strong>Category: </strong>" . $row["category"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
