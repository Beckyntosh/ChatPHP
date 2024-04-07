
<?php

// Database connection details
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$quarter = isset($_POST['quarter']) ? $conn->real_escape_string($_POST['quarter']) : '';
$year = isset($_POST['year']) ? intval($_POST['year']) : 2023; // Default to 2023 for this example
$industry = 'tech'; // Focus on tech industry for this example

// SQL query to select financial reports
$sql = "SELECT company_name, quarter, year, revenue, profit FROM financial_reports 
        WHERE quarter = ? AND year = ? AND industry = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $quarter, $year, $industry);
$stmt->execute();
$result = $stmt->get_result();

// Variables for aggregations
$totalRevenue = 0;
$totalProfit = 0;
$numReports = 0;

while ($row = $result->fetch_assoc()) {
    $totalRevenue += $row['revenue'];
    $totalProfit += $row['profit'];
    $numReports++;
}

// Averages
$averageRevenue = $numReports > 0 ? $totalRevenue / $numReports : 0;
$averageProfit = $numReports > 0 ? $totalProfit / $numReports : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Care Products Financial Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .report {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .statistics {
            padding: 15px;
            background-color: #e9ecef;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        form > * {
            padding: 8px;
            margin: 4px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-top: 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Financial Reports Search</h2>
    <form method="post">
        <input type="text" name="quarter" placeholder="Quarter (e.g., Q2)" required>
        <input type="number" name="year" placeholder="Year (e.g., 2023)" required>
        <button type="submit">Search</button>
    </form>
    <div class="statistics">
        <h3>Aggregate Results</h3>
        <p><strong>Total Reports:</strong> <?= $numReports ?></p>
        <p><strong>Total Revenue:</strong> $<?= number_format($totalRevenue) ?></p>
        <p><strong>Total Profit:</strong> $<?= number_format($totalProfit) ?></p>
        <p><strong>Average Revenue:</strong> $<?= number_format($averageRevenue) ?></p>
        <p><strong>Average Profit:</strong> $<?= number_format($averageProfit) ?></p>
    </div>
    <?php
    if ($numReports > 0) {
        $result->data_seek(0); // Move result pointer to first record
        while($row = $result->fetch_assoc()) {
            echo "<div class='report'>";
            echo "<p><strong>Company:</strong> " . htmlspecialchars($row['company_name']) . "</p>";
            echo "<p><strong>Quarter:</strong> " . htmlspecialchars($row['quarter']) . "</p>";
            echo "<p><strong>Year:</strong> " . htmlspecialchars($row['year']) . "</p>";
            echo "<p><strong>Revenue:</strong> $" . number_format(htmlspecialchars($row['revenue'])) . "</p>";
            echo "<p><strong>Profit:</strong> $" . number_format(htmlspecialchars($row['profit'])) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No financial reports found for your search criteria.</p>";
    }
    ?>
</div>
</body>
</html>
