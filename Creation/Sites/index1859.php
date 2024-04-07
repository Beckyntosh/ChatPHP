<?php
// Setting up connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a table for sales data if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS salesData (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(30) NOT NULL,
quantity_sold INT(10),
sale_amount DECIMAL(10, 2),
sale_date DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table salesData created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["salesDataFile"])) {
    require_once 'vendor/autoload.php';

    $file = $_FILES["salesDataFile"]["tmp_name"];

    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file);
    $spreadsheet = $reader->load($file);

    $worksheet = $spreadsheet->getActiveSheet();
    $rows = [];
    foreach ($worksheet->getRowIterator() AS $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells
        $cells = [];
        foreach ($cellIterator as $cell) {
            $cells[] = $cell->getValue();
        }
        $rows[] = $cells;
    }

    array_shift($rows); // remove header row
    $insertedRows = 0;
    foreach ($rows as $rowData) {
        // Insert row data into the database
        $sql = "INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sids", $rowData[0], $rowData[1], $rowData[2], $rowData[3]);
        
        if ($stmt->execute()) {
            $insertedRows++;
        }
    }

    if ($insertedRows > 0) {
        echo "Successfully inserted $insertedRows rows.";
    } else {
        echo "No rows inserted.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Organic Foods Sales Data Upload</title>
</head>
<body>
    <h2>Upload Sales Data for Q1 2024</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select spreadsheet to upload:
        <input type="file" name="salesDataFile" id="salesDataFile">
        <input type="submit" value="Upload Spreadsheet" name="submit">
    </form>
</body>
</html>
Note: This code sample assumes you have PHP and MySQL installed in your environment and that you have created the specified database. It also assumes you have the `phpoffice/phpspreadsheet` package installed for reading spreadsheet files.