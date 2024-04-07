<?php
// This is a simplified example script that handles file uploads, database interaction, and data visualization.
// IMPORTANT: This is a basic example and does not include detailed error handling, security features like input validation, or advanced performance optimizations. 

// Database credentials
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('MYSQL_HOST', 'db');
define('MYSQL_USER', 'root');

// Connect to the database
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_ROOT_PSWD, MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS toy_sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    toy_name VARCHAR(255) NOT NULL,
    quantity_sold INT NOT NULL,
    sale_date DATE NOT NULL
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Check if file is uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['spreadsheet'])) {
    $file = $_FILES['spreadsheet'];

    // Assuming the uploaded file is a CSV for simplicity
    if (($handle = fopen($file['tmp_name'], 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Insert data into the database, assuming the CSV contains columns in the order: toy_name, quantity_sold, sale_date
            $sql = "INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sis", $data[0], $data[1], $data[2]); // s for string, i for integer, s for string(date)

            if (!$stmt->execute()) {
                die("Error: " . $sql . "<br>" . $conn->error);
            }
        }
        fclose($handle);
    }
}

// Fetch sales data for visualization
$sql = "SELECT toy_name, SUM(quantity_sold) as total_sales FROM toy_sales GROUP BY toy_name";
$result = $conn->query($sql);

$dataPoints = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dataPoints[] = ['label' => $row['toy_name'], 'y' => $row['total_sales']];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toy Sales Visualization</title>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
    window.onload = function () {
     
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "Toy Sales Data"
        },
        data: [{
            type: "column",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
     
    }
    </script>
</head>
<body>

<h2>Upload Spreadsheet for Toy Sales Data</h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="spreadsheet" id="spreadsheet">
    <input type="submit" value="Upload Spreadsheet" name="submit">
</form>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>

</body>
</html>