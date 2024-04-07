<?php
// Define MySQL connection and database parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Establish a connection to the database
try {
    $pdo = new PDO(
        "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
    );
} catch (PDOException $e) {
    die("Could not connect to the database:" . $e->getMessage());
}

// Create tables if not exists
$query = "
CREATE TABLE IF NOT EXISTS vector_designs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$pdo->exec($query);

// Handling file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['vectorFile'])) {
    $file = $_FILES['vectorFile'];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred during file upload.</p>";
        return;
    }

    // Check if the file is a proper vector (.svg)
    $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if ($fileType !== 'svg') {
        echo "<p>Only SVG files are allowed.</p>";
        return;
    }

    // Sanitize and move the uploaded file
    $filename = uniqid() . '.' . $fileType;
    $destination = 'uploads/' . $filename;
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        echo "<p>Failed to move uploaded file.</p>";
        return;
    }

    // Insert file information into the database
    $stmt = $pdo->prepare("INSERT INTO vector_designs (filename) VALUES (:filename)");
    $stmt->execute(['filename' => $filename]);

    echo "<p>File uploaded successfully!</p>";
}

// Displaying the form and uploaded designs
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vector File Upload for Design Sharing</title>
    <style>
        body {
            font-family: "Courier New", Courier, monospace;
            background-color: #f5f5dc; /* Beige background for Sherlock Holmes style */
        }
        form, .gallery {
            margin: 20px auto;
            width: 50%;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload a Company Logo (SVG only)</h2>
        <input type="file" name="vectorFile" required>
        <button type="submit">Upload</button>
    </form>

    <div class="gallery">
        <h2>Shared Designs</h2>
        <?php
        $stmt = $pdo->query("SELECT filename FROM vector_designs ORDER BY upload_time DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div><img src='uploads/" . htmlspecialchars($row['filename']) . "' style='max-width:100px;'></div>";
        }
        ?>
    </div>
</body>
</html>
