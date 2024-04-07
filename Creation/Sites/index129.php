<?php

// Database connection details
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establishing the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieving user input for search
$quarter = isset($_POST['quarter']) ? $conn->real_escape_string($_POST['quarter']) : '';
$year = isset($_POST['year']) ? intval($_POST['year']) : 0;
$industry = isset($_POST['industry']) ? $conn->real_escape_string($_POST['industry']) : 'tech';

// Preparing the SQL statement
$sql = "SELECT company_name, quarter, year, revenue, profit FROM financial_reports 
        WHERE quarter = ? AND year = ? AND industry = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $quarter, $year, $industry);
$stmt->execute();
$result = $stmt->get_result();

// Statistical aggregation
$totalRevenue = 0;
$totalProfit = 0;
$companyCount = $result->num_rows;

while ($row = $result->fetch_assoc()) {
    $totalRevenue += $row['revenue'];
    $totalProfit += $row['profit'];
}

// Calculating averages
$averageRevenue = $companyCount > 0 ? $totalRevenue / $companyCount : 0;
$averageProfit = $companyCount > 0 ? $totalProfit / $companyCount : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DVDs Financial Reports Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef;
        }
        .container {
            max-width: 700px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .statistics {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        .search-form {
            margin-bottom: 20px;
        }
        input, select, button {
            padding: 8px;
            margin: 0 4px 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            cursor: pointer;
            background-color: #5cb85c;
            color: white;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Search Financial Reports</h2>
    <form class="search-form" method="post">
        <input type="text" name="quarter" placeholder="Quarter (e.g., Q2)" value="<?= htmlspecialchars($quarter) ?>">
        <input type="number" name="year" placeholder="Year (e.g., 2023)" value="<?= htmlspecialchars($year) ?>">
        <select name="industry">
            <option value="tech" <?= $industry == 'tech' ? 'selected' : '' ?>>Tech</option>
            <!-- Add more industry options here if needed -->
        </select>
        <button type="submit">Search</button>
    </form>
    <div class="statistics">
        <h3>Statistics</h3>
        <p>Total Companies: <?= $companyCount ?></p>
        <p>Total Revenue: $<?= number_format($totalRevenue) ?></p>
        <p>Total Profit: $<?= number_format($totalProfit) ?></p>
        <p>Average Revenue: $<?= number_format($averageRevenue) ?></p>
        <p>Average Profit: $<?= number_format($averageProfit) ?></p>
    </div>
</div>
</body>
</html>
