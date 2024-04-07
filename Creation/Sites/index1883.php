<?php
// File: upload_visualize.php

// Database Configuration
define("MYSQL_ROOT_PSWD", "root");
define("MYSQL_DB", "my_database");
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = MYSQL_DB;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for sales data if it does not exist
$salesTableSql = "CREATE TABLE IF NOT EXISTS sales_data (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
sales_date DATE NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
)";

if (!$conn->query($salesTableSql)) {
  die("Error creating table: " . $conn->error);
}

// Handle File Upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["salesFile"])) {
  require_once 'vendor/autoload.php';

  $file = $_FILES["salesFile"]["tmp_name"];
  $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

  try {
    $spreadsheet = $reader->load($file);
    $worksheet = $spreadsheet->getActiveSheet();
    foreach ($worksheet->getRowIterator() as $row) {
      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
      $rowData = [];
      foreach ($cellIterator as $cell) {
        $rowData[] = $cell->getValue(); // Get cell value
      }
      // Assuming the first row contains date and the second row contains sales amount
      $salesDate = $rowData[0];
      $amount = $rowData[1];
      
      // Insert data into the database
      $prep = $conn->prepare("INSERT INTO sales_data (sales_date, amount) VALUES (?, ?)");
      $prep->bind_param("sd", $salesDate, $amount);
      $prep->execute();
    }
    echo "<script>alert('Data Uploaded Successfully');</script>";
  } catch(Exception $e) {
    die('Error loading file: '. $e->getMessage());
  }
}

// Fetch sales data for visualization
$salesDataQuery = "SELECT sales_date, amount FROM sales_data ORDER BY sales_date ASC";
$salesDataResult = $conn->query($salesDataQuery);
$salesData = [];
while ($row = $salesDataResult->fetch_assoc()) {
  $salesData[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sales Data Visualization</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Upload Sales Spreadsheet for Visualization</h1>
    <form action="upload_visualize.php" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="salesFile" id="salesFile">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <canvas id="salesChart" width="400" height="400"></canvas>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesData = <?php echo json_encode($salesData); ?>;
        var salesDates = salesData.map(data => data.sales_date);
        var salesAmounts = salesData.map(data => data.amount);

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: salesDates,
                datasets: [{
                    label: 'Sales Amount',
                    data: salesAmounts,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
