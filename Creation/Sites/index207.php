<?php
// Database configuration
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Create database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'invoices'";
$result = $conn->query($tableCheckQuery);
if ($result->num_rows == 0) {
    $createTableQuery = "CREATE TABLE invoices (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        filename VARCHAR(255) NOT NULL,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (!$conn->query($createTableQuery)) {
        die("Error creating table: " . $conn->error);
    }
}

$message = '';

// File upload logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['invoiceFile'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES['invoiceFile']['name']);
    $targetFilePath = $targetDir . $fileName;
    
    // Check if file is a real invoice or fake
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES['invoiceFile']['tmp_name'], $targetFilePath)) {
        // Insert file name into the database
        $insertQuery = "INSERT INTO invoices (filename) VALUES ('" . $fileName . "')";
        if ($conn->query($insertQuery)) {
            $message = "The file " . htmlspecialchars($fileName) . " has been uploaded.";
        } else {
            $message = "Database error: " . $conn->error;
        }
    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice Upload for Bicycle Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
        }
    </style>
</head>
<body>
    <h2>Upload Invoice</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select invoice to upload:
        <input type="file" name="invoiceFile" id="invoiceFile">
        <input type="submit" value="Upload Invoice" name="submit">
    </form>
    <?php if ($message != ''): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>
<?php $conn->close(); ?>