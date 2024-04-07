<?php

// Database connection
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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    reg_date TIMESTAMP
)";
$conn->query($tableSql);

function importContacts($file, $conn) {
    if (($handle = fopen($file, "r")) !== FALSE) {
        fgetcsv($handle); // Skip header row
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $sql = "INSERT INTO contacts (name, email, phone) VALUES ('$data[0]', '$data[1]', '$data[2]')";
            if (!$conn->query($sql) === TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        fclose($handle);
        echo "Contacts imported successfully.<br>";
    }
}

function exportContacts($conn) {
    $filename = "contacts_export_" . date("Y-m-d") . ".csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'. $filename .'"');

    $output = fopen("php://output", "w");
    fputcsv($output, array('Name', 'Email', 'Phone')); // Add column headers

    $query = "SELECT name, email, phone FROM contacts";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit;
}

// Handle import request
if(isset($_FILES['contactFile'])){
    $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    if(in_array($_FILES['contactFile']['type'],$mimes)){
        importContacts($_FILES['contactFile']['tmp_name'], $conn);
    } else {
        echo "File type not allowed";
    }
}

// Handle export request
if(isset($_GET['export'])){
    exportContacts($conn);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Address Book Management</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>
    <h2>Address Book Management</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="contactFile">
        <button type="submit">Import Contacts</button>
    </form>
    <br>
    <form method="get">
        <button type="submit" name="export" value="1">Export Contacts</button>
    </form>
</body>
</html>
<?php $conn->close(); ?>
