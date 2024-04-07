<?php

// Establish database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$sqlCreateJobsTable = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(50),
    is_remote BOOLEAN DEFAULT false,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sqlCreateJobsTable)) {
    die("Error creating table: " . $conn->error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe4e1;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #b0c4de;
            color: #333;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: 1px solid #eaeaea;
        }
        footer {
            background: #b0c4de;
            color: #333;
            text-align: center;
            padding: 10px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1>Job Listings</h1>
    </header>

    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search for jobs...">
        <label for="remote">
            <input type="checkbox" name="is_remote" id="remote" value="1"> Remote Only
        </label>
        <input type="submit" value="Search">
    </form>

    <?php
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $is_remote = isset($_GET['is_remote']) ? (bool)$_GET['is_remote'] : false;

    $sqlSearch = "SELECT * FROM jobs WHERE title LIKE ? ";
    if ($is_remote) {
        $sqlSearch .= "AND is_remote = 1 ";
    }

    $stmt = $conn->prepare($sqlSearch);
    $likeSearch = "%$search%";
    $stmt->bind_param("s", $likeSearch);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<div><h2>" . $row["title"]. "</h2>" . "<p>" . $row["description"]. "</p></div>";
        }
    } else {
        echo "0 results found";
    }

    $stmt->close();
    $conn->close();
    ?>
</div>
<footer>
    <p>Job Listings for Developers</p>
</footer>
</body>
</html>
