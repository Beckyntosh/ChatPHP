<?php

// Database connection
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

// Create table if not exists
$sqlCourses = "CREATE TABLE IF NOT EXISTS courses (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL
)";

$sqlRatings = "CREATE TABLE IF NOT EXISTS ratings (
id INT AUTO_INCREMENT PRIMARY KEY,
course_id INT,
rating INT,
comment TEXT,
FOREIGN KEY (course_id) REFERENCES courses(id)
)";

if (!$conn->query($sqlCourses) || !$conn->query($sqlRatings)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rating"]) && isset($_POST["course_id"])) {
    $course_id = $_POST["course_id"];
    $rating = $_POST["rating"];
    $comment = isset($_POST["comment"]) ? $_POST["comment"] : '';

    $stmt = $conn->prepare("INSERT INTO ratings (course_id, rating, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $course_id, $rating, $comment);

    if ($stmt->execute()) {
        echo "Rating submitted successfully!";
    } else {
        echo "Error submitting rating: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Education Course Rating System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Rate an Educational Course</h1>
    <form method="post">
        <label for="course">Course</label>
        <select id="course" name="course_id">
            <?php
            $sql = "SELECT id, title FROM courses";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
                }
            } else {
                echo "<option disabled>No courses available</option>";
            }
            ?>
        </select>

        <label for="rating">Rating</label>
        <select id="rating" name="rating">
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>

        <label for="comment">Comment (Optional)</label>
        <textarea id="comment" name="comment"></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
