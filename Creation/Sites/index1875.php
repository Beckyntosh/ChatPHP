<?php
// Assuming you're using PHP 7.4+ and MySQL 5.7+ or MariaDB equivalent.

// Database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish database connection
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create table for storing uploaded data if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS sales_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quarter VARCHAR(10) NOT NULL,
    product_id INT NOT NULL,
    sales_volume INT NOT NULL,
    sales_date DATE NOT NULL
);";

if(!$mysqli->query($createTableSQL)){
    echo "ERROR: Could not able to execute $createTableSQL. " . $mysqli->error;
}

// Handle file upload
if(isset($_POST['upload']) && isset($_FILES['salesData'])) {
    $file = $_FILES['salesData'];

    if($file['error'] === 0) {
        $fileTmpPath = $file['tmp_name'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];

        // Validate file type & size here

        // Read file and insert data
        if($fileType == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' && $fileSize < 5000000) {
            require 'vendor/autoload.php';
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($fileTmpPath);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = [];
            foreach ($worksheet->getRowIterator() AS $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE); // Loop all cells, even if it is not set
                $cells = [];
                foreach ($cellIterator as $cell) {
                    $cells[] = $cell->getValue();
                }
                $rows[] = $cells;
            }

            // Insert data into MySQL
            foreach($rows as $dataRow) {
                // Skip header or invalid row
                if($dataRow[0] == 'ProductID' || count($dataRow) < 4) {
                    continue;
                }

                $insertSQL = "INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES (?, ?, ?, ?)";
                $stmt = $mysqli->prepare($insertSQL);
                $stmt->bind_param("siis", $dataRow[0], $dataRow[1], $dataRow[2], $dataRow[3]);
                $stmt->execute();
            }

            echo "Sales data uploaded successfully!";
        } else {
            echo "Invalid file type or size.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Sales Data</title>
</head>
<body>
<div style="margin:20px;">
    <h2>Upload Sales Data for Visualization</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="salesData">Sales Spreadsheet:</label>
        <input type="file" name="salesData" id="salesData" required>
        <button type="submit" name="upload">Upload</button>
    </form>
</div>
</body>
</html>
