<?php

// Database connection settings
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

// Retrieve user input
$quarter = isset($_POST['quarter']) ? $conn->real_escape_string($_POST['quarter']) : '';
$year = isset($_POST['year']) ? intval($_POST['year']) : 0;
$industry = isset($_POST['industry']) ? $conn->real_escape_string($_POST['industry']) : '';

// SQL query for searching financial reports
$sql = "SELECT company_name, quarter, year, revenue, profit FROM financial_reports 
        WHERE quarter = '$quarter' AND year = '$year' AND industry LIKE '%$industry%'";

$result = $conn->query($sql);

// Variables for aggregation
$totalRevenue = 0;
$totalProfit = 0;
$reportCount = 0;

// Process results for aggregation
if ($result) {
    while($row = $result->fetch_assoc()) {
        $totalRevenue += $row['revenue'];
        $totalProfit += $row['profit'];
        $reportCount++;
    }
}

// Calculations for averages, if applicable
$averageRevenue = $reportCount > 0 ? $totalRevenue / $reportCount : 0;
$averageProfit = $reportCount > 0 ? $totalProfit / $reportCount : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Supplies Financial Reports Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .report, .statistics {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            background-color: #e9ecef;
        }
        .statistics strong {
            display: block;
            margin-top: 5px;
        }
        form > * {
            padding: 8px;
            margin: 0 8px 8px 0;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }
        button {
            cursor: pointer;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        button:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Search for Financial Reports</h2>
    <form action="" method="post">
        <input type="text" name="quarter" placeholder="Quarter (e.g., Q2)" value="<?= htmlspecialchars($quarter) ?>">
        <input type="number" name="year" placeholder="Year (e.g., 2023)" value="<?= htmlspecialchars($year) ?>">
        <input type="text" name="industry" placeholder="Industry (e.g., tech)" value="<?= htmlspecialchars($industry) ?>">
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
    // Reset result pointer and display individual reports
    if ($result && $reportCount > 0) {
        $result->data_seek(0); // Move pointer to beginning
        while($row = $result->fetch_assoc()) {
            echo '<div class="report">';
            echo '<h4>' . htmlspecialchars($row["company_name"]) . '</h4>';
            echo '<p>Quarter: ' . htmlspecialchars($row["quarter"]) . ' ' . htmlspecialchars($row["year"]) . '</p>';
            echo '<p>Revenue: $' . number_format(htmlspecialchars($row["revenue"])) . '</p>';
            echo '<p>Profit: $' . number_format(htmlspecialchars($row["profit"])) . '</p>';
            echo '</div>';
        }
    }
    ?>
</div>
</body>
</html>
