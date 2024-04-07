

<?php

// Error Reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database Configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Table If Not Exists
$sql = "CREATE TABLE IF NOT EXISTS sales_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    sales_quantity INT(10) NOT NULL,
    sales_period VARCHAR(50),
    reg_date TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["spreadsheet"])) {
    
    // Assuming Uploaded File is in CSV Format
    $filename = $_FILES["spreadsheet"]["tmp_name"];
    
    if ($_FILES["spreadsheet"]["size"] > 0) {
        
        $file = fopen($filename, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $product_name = $column[0];
            $sales_quantity = $column[1];
            $sales_period = $column[2]; // Assuming 'Q1 2024' format
            
            $sqlInsert = "INSERT into sales_data (product_name, sales_quantity, sales_period)
                   values (?, ?, ?)";
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bind_param("sis", $product_name, $sales_quantity, $sales_period);
            $stmt->execute();
        }
        fclose($file);
        echo "CSV File has been successfully Imported.";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Spreadsheet - School Supplies Sales Data</title>
</head>
<body>

<form class="form-horizontal" action="" method="post" name="uploadCSV"
    enctype="multipart/form-data">
    <div>
        <label>Upload Your CSV File</label>
        <input type="file" name="spreadsheet" accept=".csv">
        <button type="submit" name="import">Import</button>
    </div>
</form>

</body>
</html>

This code is a simplified approach that takes a CSV file input from the user, parses it, and inserts its contents into a MySQL database. Note that for real-world applications:
- Detailed input validation and sanitation are necessary to avoid SQL injections and other security risks.
- More comprehensive error handling should be implemented, especially for file uploads and database interactions.
- Depending on your exact requirements, further functionality may be required to handle different spreadsheet formats (e.g., XLSX), which would necessitate additional libraries such as PhpSpreadsheet.
- This example lacks user authentication, file validation, and other critical security measures.

For a deployable application, especially one intended for educational or research purposes where data integrity and security are paramount, substantial enhancement and professional review of the code are advised.