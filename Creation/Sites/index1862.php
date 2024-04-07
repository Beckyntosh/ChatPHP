<?php
// Simple example to demonstrate the requested feature in a single file approach for educational purposes.

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for sales data if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS sales_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    product_name VARCHAR(50) NOT NULL,
    quantity_sold INT(10) NOT NULL,
    sale_date DATE NOT NULL,
    revenue FLOAT NOT NULL
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["spreadsheet"])) {
    if ($_FILES["spreadsheet"]["error"] == 0) {
        $filename = $_FILES["spreadsheet"]["tmp_name"];
        
        // Assuming the uploaded file is in CSV format
        if (($handle = fopen($filename, "r")) !== FALSE) {
            $row = 0;
            
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($row > 0) { // Skip header row
                    $product_name = $conn->real_escape_string($data[0]);
                    $quantity_sold = intval($data[1]);
                    $sale_date = $conn->real_escape_string($data[2]);
                    $revenue = floatval($data[3]);
                    
                    $insertSQL = "INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('$product_name', $quantity_sold, '$sale_date', $revenue)";
                    
                    if (!$conn->query($insertSQL) === TRUE) {
                        echo "Error: " . $insertSQL . "<br>" . $conn->error;
                    }
                }
                $row++;
            }
            fclose($handle);
        }
    } else {
        echo "Upload failed with error code " . $_FILES["spreadsheet"]["error"];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Sales Data</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { text-align: left; padding: 8px; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Sales Spreadsheet (CSV Format)</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="spreadsheet" id="spreadsheet">
        <input type="submit" value="Upload" name="submit">
    </form>
</div>

</body>
</html>

Note: This is a simplified example for educational purposes and does not include extensive security measures, error handling, or input validation that would be necessary for production deployment. Always ensure secure handling of file uploads and database interactions in your applications.