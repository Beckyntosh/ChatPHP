<?php
// Define MySQL connection variables
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL database
$pdoOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
];

$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, // DSN
    MYSQL_USER, // Username
    MYSQL_PASSWORD, // Password
    $pdoOptions // Options
);

// Create table for uploaded spreadsheet data if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS sunglasses_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    style VARCHAR(255) NOT NULL,
    sales INT(11) NOT NULL
)");

// Function to insert data into MySQL database
function insertData($style, $sales, $pdo) {
    $sql = "INSERT INTO sunglasses_data (style, sales) VALUES (?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$style, $sales]);
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['spreadsheet'])) {
    if ($_FILES['spreadsheet']['error'] == 0) {
        $fileName = $_FILES['spreadsheet']['tmp_name'];

        // Assuming uploaded file is in CSV format
        if (($handle = fopen($fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($data) >= 2) { // Assuming each row has at least 2 columns: style and sales
                    insertData($data[0], $data[1], $pdo);
                }
            }
            fclose($handle);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sunglasses Data Visualization</title>
Add Chart.js to visualize data
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Upload a Spreadsheet</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="spreadsheet" required>
    <button type="submit">Upload and Visualize</button>
</form>

<script>
function fetchDataAndRenderChart() {
    fetch("data.php")
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Sales',
                    data: data.sales,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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
    });
}
window.onload = fetchDataAndRenderChart;
</script>

</body>
</html>