<?php
// Database connection details
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    reg_date TIMESTAMP)";

if (!$conn->query($tableQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Frontend & Import/Export Handlers
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['importFile'])) {
        // Handle file import
        $filename = $_FILES['importFile']['tmp_name'];
        if ($_FILES['importFile']['size'] > 0) {
            $file = fopen($filename, 'r');
            while (($importData = fgetcsv($file, 1000, ',')) !== FALSE) {
                $sql = "INSERT INTO contacts (name, email, phone) VALUES ('$importData[0]', '$importData[1]', '$importData[2]')";
                $conn->query($sql);
            }
            fclose($file);
        }
    } elseif (isset($_POST['export'])) {
        // Handle CSV Export
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=contacts.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Name', 'Email', 'Phone'));

        $query = "SELECT name, email, phone FROM contacts";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row);
        }
        fclose($output);
        exit();
    }
}

// HTML Form for Import/Export
echo '<!DOCTYPE html>
<html>
<head><title>Address Book Management</title></head>
<body>
    <h2>Address Book Import/Export</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Import Contacts: <input type="file" name="importFile"><br><br>
        <input type="submit" value="Import">
    </form>
    <br>
    <form action="" method="post">
        <input type="submit" name="export" value="Export">
    </form>
</body>
</html>';

$conn->close();
?>