<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for Sales Data if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS sales_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    sold_quantity INT(10) NOT NULL,
    sales_period VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handling file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["datafile"]["name"])) {
    $filename = $_FILES['datafile']['tmp_name'];
    $file = fopen($filename, "r");

    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
        $product_name = $column[0];
        $sold_quantity = $column[1];
        $sales_period = $column[2];

        $sql = "INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $product_name, $sold_quantity, $sales_period);
        $stmt->execute();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gardening Tools Sales Data Visualization</title>
    <style>
        body { font-family: Arial, sans-serif; font-weight: bold; }
        .container { width: 80%; margin: 0 auto; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Spreadsheet for Q1 2024 Sales Data</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Select spreadsheet to upload:</label>
            <input type="file" name="datafile">
            <input type="submit" value="Upload Data">
        </form>
    </div>
</body>
</html>
<?php
// Close database connection
$conn->close();
Note: Before running this script, ensure your environment is set up correctly, including a running MySQL server with the indicated credentials and an existing database named "my_database". This script does not manage visual data representation explicitly due to complexity and scope but focuses on data upload and storage as requested.