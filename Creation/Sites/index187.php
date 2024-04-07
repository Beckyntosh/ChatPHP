<?php

// Database connection setup
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collecting user inputs
$quarter = isset($_POST['quarter']) ? $conn->real_escape_string($_POST['quarter']) : '';
$year = isset($_POST['year']) ? intval($_POST['year']) : 0;
$industry = 'tech'; // Set to 'tech' for this example

// SQL query to fetch the financial reports
$sql = "SELECT company_name, quarter, year, revenue, profit FROM financial_reports 
        WHERE quarter = ? AND year = ? AND industry = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $quarter, $year, $industry);
$stmt->execute();
$result = $stmt->get_result();

// Initialize aggregation variables
$totalRevenue = 0;
$totalProfit = 0;
$reportCount = 0;

// Aggregate results
while ($row = $result->fetch_assoc()) {
    $totalRevenue += $row['revenue'];
    $totalProfit += $row['profit'];
    $reportCount++;
}

// Calculating averages
$averageRevenue = $reportCount > 0 ? $totalRevenue / $reportCount : 0;
$averageProfit = $reportCount > 0 ? $totalProfit / $reportCount : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Financial Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .report, .statistics {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
        .statistics strong {
            display: block;
            margin-top: 10px;
        }
        form > * {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Search and Aggregate Financial Reports</h2>
    <form method="post">
        <input type="text" name="quarter" placeholder="Quarter (e.g., Q2)" value="<?= htmlspecialchars($quarter) ?>">
        <input type="number" name="year" placeholder="Year (e.g., 2023)" value="<?= htmlspecialchars($year) ?>">
        <button type="submit">Search</button>
    </form>
    <div class="statistics">
        <h3>Aggregate Statistics</h3>
        <strong>Total Reports: <?= htmlspecialchars($reportCount) ?></strong>
        <strong>Total Revenue: $<?= number_format($totalRevenue) ?></strong>
        <strong>Total Profit: $<?= number_format($totalProfit) ?></strong>
        <strong>Average Revenue: $<?= number_format($averageRevenue) ?></strong>
        <strong>Average Profit: $<?= number_format($averageProfit) ?></strong>
    </div>
    <?php
    if ($reportCount > 0) {
        // Reset result pointer to display individual reports again if needed
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            // Individual report display can be implemented here
        }
    } else {
        echo "<p>No reports found matching the criteria.</p>";
    }
    ?>
</div>
</body>
</html>
