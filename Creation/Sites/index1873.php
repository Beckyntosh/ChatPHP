

<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root"; // As per your setup, but avoid such passwords in production!
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle File Upload and Parse
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["spreadsheet"])) {
    $fileName = $_FILES["spreadsheet"]["tmp_name"];
    if ($_FILES["spreadsheet"]["size"] > 0) {
        $file = fopen($fileName, "r");

        // Skip the first row if it contains headers
        fgetcsv($file);

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into sales_data (date, sales) values (?,?)";
            $stmt = $conn->prepare($sqlInsert);
            // Assuming CSV columns: Date, Sales
            $stmt->bind_param("sd", $column[0], $column[1]);
            $stmt->execute();
        }
    }
}

// Fetch data for visualization
$sqlQuery = "SELECT date, sales FROM sales_data";
$result = $conn->query($sqlQuery);
$dataPoints = [];
while ($row = $result->fetch_assoc()) {
    $dataPoints[] = $row;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wine Sales Visualization</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div style="width:60%;margin:auto;">
    <h2>Q1 2024 Wine Sales Visualization</h2>
    <canvas id="salesChart"></canvas>
</div>

<form action="" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="spreadsheet" id="spreadsheet">
    <input type="submit" value="Upload Spreadsheet" name="submit">
</form>

<script>
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode(array_column($dataPoints, 'date')) ?>,
        datasets: [{
            label: 'Sales',
            data: <?= json_encode(array_column($dataPoints, 'sales')) ?>,
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

This code makes several assumptions:
1. **File Uploads**: The uploaded spreadsheet is in a CSV format with two columns: Date and Sales.
2. **Database Table**: It assumes a table named `sales_data` with at least two columns, `date` and `sales`, where `date` is a `VARCHAR` or `DATE` and `sales` is a `DECIMAL` or `FLOAT`.
3. **Security**: For brevity, this code does not implement extensive security measures, such as validating file uploads or using secure database connections (with SSL).

To deploy:
1. Ensure your environment is running a web server with PHP and MySQL.
2. Create the required database and table in MySQL.
3. Place this script in your server's root or as configured.
4. Visit the script's URL, upload a spreadsheet, and view the visualization.

Remember to adapt, expand and secure this example according to your specific needs and environments.