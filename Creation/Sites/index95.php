<?php
$host = 'db';
$db = 'my_database';
$user = 'root';
$pass = 'root';

// Try and connect to the database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$queries = [
    "CREATE TABLE IF NOT EXISTS job_types (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        type VARCHAR(30) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS locations (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        location VARCHAR(50) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS experience_levels (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        level VARCHAR(30) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS jobs (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        job_type INT(6) UNSIGNED,
        location INT(6) UNSIGNED,
        experience_level INT(6) UNSIGNED,
        FOREIGN KEY (job_type) REFERENCES job_types(id),
        FOREIGN KEY (location) REFERENCES locations(id),
        FOREIGN KEY (experience_level) REFERENCES experience_levels(id)
    )"
];

foreach ($queries as $query) {
    if (!$conn->query($query)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Insert test data into tables
$initQueries = [
    "INSERT IGNORE INTO job_types (id, type) VALUES (1, 'Full-time'), (2, 'Part-time'), (3, 'Contract')",
    "INSERT IGNORE INTO locations (id, location) VALUES (1, 'CyberCity'), (2, 'Neo-Tokyo'), (3, 'Silicon Valley')",
    "INSERT IGNORE INTO experience_levels (id, level) VALUES (1, 'Entry Level'), (2, 'Mid Level'), (3, 'Senior Level')"
];

foreach ($initQueries as $query) {
    if (!$conn->query($query)) {
        echo "Error inserting data: " . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shoe Jobs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2a2b2e;
            color: #00ff6a;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        select, input[type="submit"] {
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #00ff6a;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Cyberpunk Shoe Jobs Search</h1>
    <form action="" method="get">
        <select name="job_type">
            <option value="">Select Job Type</option>
            <?php
            $result = $conn->query("SELECT * FROM job_types");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['type'] . "</option>";
            }
            ?>
        </select>
        <select name="location">
            <option value="">Select Location</option>
            <?php
            $result = $conn->query("SELECT * FROM locations");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['location'] . "</option>";
            }
            ?>
        </select>
        <select name="experience_level">
            <option value="">Select Experience Level</option>
            <?php
            $result = $conn->query("SELECT * FROM experience_levels");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['level'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Search">
    </form>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Type</th>
            <th>Location</th>
            <th>Experience Level</th>
        </tr>
        <?php
        $where = [];
        if (!empty($_GET['job_type'])) {
            $where[] = 'jobs.job_type = ' . intval($_GET['job_type']);
        }
        if (!empty($_GET['location'])) {
            $where[] = 'jobs.location = ' . intval($_GET['location']);
        }
        if (!empty($_GET['experience_level'])) {
            $where[] = 'jobs.experience_level = ' . intval($_GET['experience_level']);
        }
        $whereSQL = !empty($where) ? ' WHERE ' . implode(' AND ', $where) : '';

        $sql = "SELECT jobs.title, jobs.description, job_types.type, locations.location, experience_levels.level 
                FROM jobs
                INNER JOIN job_types ON jobs.job_type = job_types.id
                INNER JOIN locations ON jobs.location = locations.id
                INNER JOIN experience_levels ON jobs.experience_level = experience_levels.id" . $whereSQL;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["title"] . "</td>
                        <td>" . $row["description"] . "</td>
                        <td>" . $row["type"] . "</td>
                        <td>" . $row["location"] . "</td>
                        <td>" . $row["level"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No jobs found</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>