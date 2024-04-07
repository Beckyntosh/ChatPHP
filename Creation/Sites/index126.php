<?php

// Database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User search parameters
$quarter = isset($_POST['quarter']) ? $_POST['quarter'] : '';
$year = isset($_POST['year']) ? (int)$_POST['year'] : 0;
$industry = isset($_POST['industry']) ? $_POST['industry'] : '';

// SQL query to fetch data
$sql = "SELECT company_name, quarter, year, revenue, profit, industry FROM financial_reports 
        WHERE quarter = ? AND year = ? AND industry LIKE ?";

$stmt = $conn->prepare($sql);
$searchIndustry = "%$industry%";
$stmt->bind_param("sis", $quarter, $year, $searchIndustry);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Financial Reports</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .report {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
        .title {
            font-size: 18px;
            color: #333;
        }
        .details {
            font-size: 16px;
            margin-top: 5px;
        }
        form {
            margin-bottom: 20px;
        }
        input, select, button {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Financial Reports Search</h2>
    <form method="post">
        <input type="text" name="quarter" placeholder="Quarter (e.g., Q2)" required>
        <input type="number" name="year" placeholder="Year (e.g., 2023)" required>
        <input type="text" name="industry" placeholder="Industry (e.g., tech)" required>
        <button type="submit">Search</button>
    </form>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="report">';
            echo '<div class="title">' . htmlspecialchars($row['company_name']) . '</div>';
            echo '<div class="details">Quarter: ' . htmlspecialchars($row['quarter']) . ' ' . htmlspecialchars($row['year']) . '</div>';
            echo '<div class="details">Revenue: $' . number_format(htmlspecialchars($row['revenue'])) . '</div>';
            echo '<div class="details">Profit: $' . number_format(htmlspecialchars($row['profit'])) . '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No reports found matching your criteria.</p>';
    }
    ?>
</div>
</body>
</html>
