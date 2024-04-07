<?php
// Connect to the database
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS `sales_data` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `quarter` varchar(10) NOT NULL,
    `category` varchar(50) NOT NULL,
    `amount` decimal(10,2) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['spreadsheet']['name'])) {
  $fileName = $_FILES['spreadsheet']['tmp_name'];
  
  if ($_FILES['spreadsheet']['size'] > 0) {
    $file = fopen($fileName, "r");
    
    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
      $quarter = $column[0];
      $category = $column[1];
      $amount = $column[2];
    
      $insert_sql = "INSERT INTO sales_data (quarter, category, amount) VALUES ('".$quarter."', '".$category."', '".$amount."')";
      
      if (!$conn->query($insert_sql) === TRUE) {
        echo "Error inserting data: " . $conn->error;
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sales Data Upload and Visualization</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<h2>Upload Sales Data (CSV)</h2>
<form method="POST" enctype="multipart/form-data">
  <input type="file" name="spreadsheet" accept=".csv">
  <button type="submit">Upload</button>
</form>

<h2>Sales Data Visualization</h2>
<canvas id="salesChart" style="width: 100%; height: 500px;"></canvas>
<script>
fetch('./data.php')
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
</script>
</body>
</html>
<?php
$conn->close();
?>
