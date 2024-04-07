<?php
// Database configuration
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

// Create job_listing table if not exists
$jobListingSql = "CREATE TABLE IF NOT EXISTS job_listing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    location VARCHAR(100),
    type VARCHAR(50),
    salary DECIMAL(10, 2)
);";
$conn->query($jobListingSql);

// Insert job listing (example POST request handling)
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $salary = $_POST['salary'];

    $insertSql = "INSERT INTO job_listing (title, description, location, type, salary) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("ssssd", $title, $description, $location, $type, $salary);
    $stmt->execute();
    echo "New job listing added successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautical Navigator Jewelry Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header{
            background: #000033;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header a{
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        footer{
            background: #000033;
            color: #fff;
            text-align: center;
            padding: 5px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Nautical Navigator: Jewelry Personal Portfolio</h1>
        </div>
    </header>

    <div class="container">
        <h2>Post a Job Listing</h2>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Job Title" required><br>
            <textarea name="description" placeholder="Job Description" required></textarea><br>
            <input type="text" name="location" placeholder="Location" required><br>
            <input type="text" name="type" placeholder="Job Type" required><br>
            <input type="number" step="0.01" name="salary" placeholder="Salary" required><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <footer>
        <p>Nautical Navigator Jewelry Portfolio &copy; 2023</p>
    </footer>
</body>
</html>