<?php
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

// Check if table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'retirement_calculations';";
$result = $conn->query($tableCheckQuery);

if ($result->num_rows == 0) {
    $createTable = "CREATE TABLE retirement_calculations (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        current_age INT(3),
        retirement_age INT(3),
        monthly_income_needed DECIMAL(10,2),
        savings_needed DECIMAL(10,2),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        echo "Table retirement_calculations created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// HTML and PHP mixed for simplicity
?>
<!DOCTYPE html>
<html>
<head>
    <title>Retirement Savings Calculator</title>
    <style>
        body{ font-family: "Courier New", monospace; }
        .container{ width: 300px; margin: auto; }
        input[type="number"], button{ padding: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Retirement Savings Calculator</h2>
    <form method="post">
        <label>Current Age:</label><br>
        <input type="number" name="current_age" required><br>
        <label>Desired Retirement Age:</label><br>
        <input type="number" name="retirement_age" required><br>
        <label>Monthly Income Needed at Retirement:</label><br>
        <input type="number" step="0.01" name="monthly_income_needed" required><br><br>
        <button type="submit" name="calculate">Calculate</button>
    </form>
    <?php
    if (isset($_POST['calculate'])) {
        $current_age = $_POST['current_age'];
        $retirement_age = $_POST['retirement_age'];
        $monthly_income_needed = $_POST['monthly_income_needed'];

        // Simplified calculation: Assuming a fixed annual return of 5% from investments
        $years_until_retirement = $retirement_age - $current_age;
        $savings_needed = $monthly_income_needed * 12 * $years_until_retirement / 0.05;

        echo "<p>You need to save: $" . number_format($savings_needed, 2) . "</p>";

        $insertSQL = "INSERT INTO retirement_calculations (current_age, retirement_age, monthly_income_needed, savings_needed) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSQL);
        $stmt->bind_param("iiid", $current_age, $retirement_age, $monthly_income_needed, $savings_needed);
        $stmt->execute();
    }
    ?>
</div>

</body>
</html>
<?php $conn->close(); ?>
