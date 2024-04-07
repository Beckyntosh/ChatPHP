<?php

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search and filters
$search = isset($_POST['search']) ? $conn->real_escape_string($_POST['search']) : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';

// SQL query
$sql = "SELECT * FROM job_listings WHERE position LIKE '%$search%' ";
if (!empty($type)) {
    $sql .= "AND type='$type' ";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <title>Toys Job Listings</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4e8c1;
            color: #3e2723;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fbf0e4;
            padding: 20px;
            border: 1px solid #d3c1a5;
            border-radius: 8px;
        }
        .job-listing {
            background: #fff8e1;
            margin-bottom: 10px;
            padding: 15px;
            border: 1px solid #dcdcdc;
            border-radius: 5px;
        }
        .job-title {
            font-size: 24px;
            color: #5d4037;
        }
        .filter-section {
            margin-bottom: 20px;
        }
        button {
            background-color: #8d6e63;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #6d4c41;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Find Your Dream Job in the World of Toys</h1>
    <div class="filter-section">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Search for jobs, e.g., 'remote software creator'" value="<?= htmlspecialchars($search) ?>">
            <select name="type">
                <option value="">Select job type</option>
                <option value="full-time" <?= $type == 'full-time' ? 'selected' : '' ?>>Full-time</option>
                <option value="part-time" <?= $type == 'part-time' ? 'selected' : '' ?>>Part-time</option>
                <option value="remote" <?= $type == 'remote' ? 'selected' : '' ?>>Remote</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="job-listing">';
            echo '<div class="job-title">' . htmlspecialchars($row["title"]) . '</div>';
            echo '<div>Type: ' . htmlspecialchars($row["type"]) . '</div>';
            echo '<div>Description: ' . nl2br(htmlspecialchars($row["description"])) . '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>No job listings found.</p>";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
