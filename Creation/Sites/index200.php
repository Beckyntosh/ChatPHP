<?php

// Database connection details
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establishing the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user inputs
$quarter = isset($_POST['quarter']) ? $conn->real_escape_string($_POST['quarter']) : '';
$year = isset($_POST['year']) ? intval($_POST['year']) : 2023; // Example year for demonstration
$industry = 'tech'; // Focus is on tech companies for this example

// SQL query to fetch the financial reports
$sql = "SELECT company_name, quarter, year, revenue, profit FROM financial_reports 
        WHERE quarter = ? AND year = ? AND industry = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $quarter, $year, $industry);
$stmt->execute();
$result = $stmt->get_result();

// Variables for aggregation
$totalRevenue = 0;
$totalProfit = 0;
$numReports = 0;

// Aggregating data from the result
while ($row = $result->fetch_assoc()) {
    $totalRevenue += $row['revenue'];
    $totalProfit += $row['profit'];
    $numReports++;
}

// Calculating averages if there are reports
$averageRevenue = $numReports > 0 ? $totalRevenue / $numReports : 0;
$averageProfit = $numReports > 0 ? $totalProfit / $numReports : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Brand Financial Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .statistics {
            padding: 15px;
            background-color: #e9ecef;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 16px;
        }
        .statistics strong {
            color: #007bff;
        }
        form > * {
            padding: 8px;
            margin: 4px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Financial Reports Search - Happy Clothing Co.</h2>
    <form method="post">
        <input type="text" name="quarter" placeholder="Quarter (e.g., Q2)" required>
        <input type="number" name="year" placeholder="Year (e.g., 2023)" required>
        <button type="submit">Search</button>
    </form>
    <div class="statistics">
        <h3>Aggregated Results:</h3>
        <p>Total Reports Found: <strong><?= $numReports ?></strong></p>
        <p>Total Revenue: <strong>$<?= number_format($totalRevenue) ?></strong></p>
        <p>Total Profit: <strong>$<?= number_format($totalProfit) ?></strong></p>
        <p>Average Revenue: <strong>$<?= number_format($averageRevenue) ?></strong></p>
        <p>Average Profit: <strong>$<?= number_format($averageProfit) ?></strong></p>
    </div>
    <?php
    if ($numReports > 0) {
        $result->data_seek(0); // Optional: Reset result pointer for displaying reports in detail
        // Detailed report display can be implemented here if needed
    } else {
        echo "<p>No financial reports found matching your search criteria. Try another search!</p>";
    }
    ?>
</div>
</body>
</html>
