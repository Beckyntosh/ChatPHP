<?php

// Database connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create additional tables if they don't exist
$create_downloads_table = "CREATE TABLE IF NOT EXISTS downloads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    file_path VARCHAR(255)
)";

if (!$conn->query($create_downloads_table)) {
    echo "Error creating table: " . $conn->error;
}

// Style for the pink theme
echo '<style>
    body { background-color: #F8C8DC; color: #880E4F; font-family: Arial, sans-serif; }
    .container { width: 80%; margin: auto; overflow: hidden; }
    header { background: #F06292; color: #FCE4EC; padding-top: 30px; min-height: 70px; border-bottom: #880E4F 3px solid; }
    header h1 { text-align: center; margin: 0; }
    nav { background: #FCE4EC; padding: 5px; text-align: center; }
    nav a { background: #F48FB1; color: #880E4F; padding: 10px 15px; text-decoration: none; font-size: 17px; }
    .content { padding: 20px; }
    .download-link { display: block; padding: 10px; background: #F8BBD0; color: #4A235A; margin: 5px 0; text-align: center; text-decoration: none; }
</style>';

// Handling file download request
if(isset($_GET['download_id'])) {
    $id = intval($_GET['download_id']);
    $query = "SELECT * FROM downloads WHERE id = $id";
    $result = $conn->query($query);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file = __DIR__ . '/' . $row['file_path']; // Make sure this path is correct

        if(file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Games Personal Portfolio</title>
</head>
<body>
<header>
    <h1>Downloadable Resources</h1>
</header>
<div class="container">
    <nav>
        <a href="/">Home</a>
    </nav>
    <div class="content">
        <h2>Available Downloads</h2>
        <?php
        // Fetching and displaying links to available downloads
        $query = "SELECT * FROM downloads";
        $result = $conn->query($query);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<a href="?download_id=' . $row['id'] . '" class="download-link">' . htmlspecialchars($row['title']) . '</a>';
            }
        } else {
            echo '<p>No downloads available.</p>';
        }
        ?>
    </div>
</div>
</body>
</html>
<?php $conn->close(); ?>