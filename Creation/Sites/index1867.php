<?php
// Connection variables
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

// Create table
$sql = "CREATE TABLE IF NOT EXISTS sales_data (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
quarter VARCHAR(30) NOT NULL,
sales DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Table creation success or already exists, silent confirmation
} else {
  echo "Error creating table: " . $conn->error;
}

// File upload and parsing
if (isset($_FILES['spreadsheet'])) {
  require 'vendor/autoload.php';

  $file = $_FILES['spreadsheet']['tmp_name'];
  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
  $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

  // Insert data into database
  foreach ($sheetData as $row) {
    $quarter = $row['A']; // Assuming 'A' column is for quarter
    $sales = $row['B']; // Assuming 'B' column is for sales data

    $stmt = $conn->prepare("INSERT INTO sales_data (quarter, sales) VALUES (?, ?)");
    $stmt->bind_param("sd", $quarter, $sales);
    $stmt->execute();
  }

  $stmt->close();
  echo "<p>Data imported successfully.</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wines Sales Data Visualization</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Upload Sales Data for Visualization</h1>
    <form action="" method="post" enctype="multipart/form-data">
       Upload your Q1 2024 sales data spreadsheet here: 
       <input type="file" name="spreadsheet" required>
       <input type="submit" value="Upload Data">
    </form>
    
Visualization (Basic representation)
    <div id="visualization"></div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      // Fetch sales data from database and generate visualization
      fetch('getSalesData.php')
        .then(response => response.json())
        .then(data => {
          const ctx = document.getElementById('visualization').getContext('2d');
          const salesChart = new Chart(ctx, {
            // Chart configuration
            type: 'bar',
            data: {
                labels: data.quarters, // X-axis labels
                datasets: [{
                    label: 'Sales in USD',
                    data: data.sales, // Sales data
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
          });
        })
        .catch(error => console.error('Error:', error));
    </script>
</body>
</html>

**Note:** This code does not include the PHP vendor autoload or the necessary backend file (`getSalesData.php`) to fetch and serve the sales data as JSON. To fully implement this, ensure you have PhpSpreadsheet installed via Composer, and implement the backend logic to fetch sales data from the `sales_data` table and return it as JSON for the Chart.js visualization. Adjust column and quarter handling based on the actual structure of your spreadsheet. 

To maintain security, consider applying best practices such as validating and sanitizing all inputs and using prepared statements to interact with the MySQL database.