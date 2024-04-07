<?php
// Database configuration
$host = 'db';
$dbname = 'my_database';
$username = 'root';
$password = 'root';

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$initSQL1 = "CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

$initSQL2 = "CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    user_id INT,
    rating INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);";

$conn->query($initSQL1);
$conn->query($initSQL2);

// Create course functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    $stmt = $conn->prepare("INSERT INTO courses (title, description, category) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $category);

    if ($stmt->execute()) {
        echo "Course created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #6C7A89; /* Light greyish blue */
            color: #FFFFFF; /* White */
            padding: 20px;
        }
        .container {
            background-color: #4B77BE; /* Darker blue */
            padding: 20px;
            border-radius: 8px;
        }
        h1 {
            color: #E4F1FE; /* Light blue */
        }
        label, input, button {
            display: block;
            width: 100%;
            margin: 10px 0;
        }
        input, button {
            padding: 10px;
            border-radius: 5px;
            border: none;
        }
        button {
            background-color: #26A65B; /* Forest green */
            color: #FFFFFF;
            cursor: pointer;
        }
        button:hover {
            background-color: #2ECC71; /* Lighter forest green */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create a New Course</h1>
        <form action="" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>