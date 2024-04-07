<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$initSQL = [
    "CREATE TABLE IF NOT EXISTS galleries (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );",
    
    "CREATE TABLE IF NOT EXISTS images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        gallery_id INT,
        filename VARCHAR(255),
        uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (gallery_id) REFERENCES galleries(id) ON DELETE CASCADE
    );",
    
    "CREATE TABLE IF NOT EXISTS tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        description TEXT,
        is_completed BOOLEAN DEFAULT FALSE
    );"
];

foreach ($initSQL as $sql) {
    if (!$conn->query($sql)) {
        die("Error creating table: " . $conn->error);
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Image upload handling
    if (isset($_FILES['image'])) {
        $galleryId = $_POST['gallery_id'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $filename = $_FILES["image"]["name"];
            $stmt = $conn->prepare("INSERT INTO images (gallery_id, filename) VALUES (?, ?)");
            $stmt->bind_param("is", $galleryId, $filename);
            $stmt->execute();
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Add task handling
    if (isset($_POST['task_description'])) {
        $taskDescription = $_POST['task_description'];
        $stmt = $conn->prepare("INSERT INTO tasks (description) VALUES (?)");
        $stmt->bind_param("s", $taskDescription);
        $stmt->execute();
        echo "Task added successfully.";
    }

    // Search galleries
    if (isset($_POST['search_term'])) {
        $searchTerm = $_POST['search_term'];
        $stmt = $conn->prepare("SELECT * FROM galleries WHERE title LIKE CONCAT('%', ?, '%')");
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo "Gallery ID: " . $row['id'] . " - Title: " . $row['title'] . "<br>";
        }
    }
}

// Disconnect 
$conn->close();

$html = <<<EOD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Makeup Webshop</title>
    <style>
        body {background-color: #e0f2f1;}
        h1 {color: #4caf50;}
        form {margin-top: 20px;}
    </style>
</head>
<body>
    <h1>Makeup Webshop - Spring Theme</h1>
   
Image upload form
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="image">
        Gallery ID: <input type="number" name="gallery_id" id="gallery_id" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>

Add task form
    <form action="" method="post">
        Task Description:
        <input type="text" name="task_description" required>
        <input type="submit" value="Add Task">
    </form>

Search gallery
    <form action="" method="post">
        Search for a gallery:
        <input type="text" name="search_term" required>
        <input type="submit" value="Search">
    </form>
</body>
</html>
EOD;

echo $html;
?>