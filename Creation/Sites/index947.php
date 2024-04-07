<?php
// Simple Retirement Savings Calculator Web Application

// Define MYSQL credentials
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Establish database connection
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check for and handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentAge = $_POST['currentAge'];
    $retirementAge = $_POST['retirementAge'];
    $monthlyIncome = $_POST['monthlyIncome'];

    // Basic Validation
    if (!empty($currentAge) && !empty($retirementAge) && !empty($monthlyIncome)) {
        $yearsUntilRetirement = $retirementAge - $currentAge;
        
        // Simplified calculation: Assumption is $monthlyIncome*12 for each remaining year until retirement age.
        $savingsNeeded = ($monthlyIncome * 12) * $yearsUntilRetirement;
        
        // Store result in the database (Result Table: id, currentAge, retirementAge, monthlyIncome, savingsNeeded)
        $stmt = $conn->prepare("INSERT INTO RetirementCalculations (currentAge, retirementAge, monthlyIncome, savingsNeeded) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiii", $currentAge, $retirementAge, $monthlyIncome, $savingsNeeded);
        $stmt->execute();
        $stmt->close();
        $resultMessage = "You need to save a total of $" . number_format($savingsNeeded) . " for retirement.";
    } else {
        $resultMessage = "Please fill in all the fields.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Retirement Savings Calculator</title>
</head>
<body>
    <h1>Retirement Savings Calculator</h1>
    <form method="post">
        <label for="currentAge">Current Age:</label><br>
        <input type="number" id="currentAge" name="currentAge" required><br>
        <label for="retirementAge">Desired Retirement Age:</label><br>
        <input type="number" id="retirementAge" name="retirementAge" required><br>
        <label for="monthlyIncome">Desired Monthly Income at Retirement:</label><br>
        <input type="number" id="monthlyIncome" name="monthlyIncome" required><br>
        <input type="submit" value="Calculate">
    </form>
    <?php if (!empty($resultMessage)) : ?>
        <p><?= $resultMessage ?></p>
    <?php endif; ?>
</body>
</html>

<?php $conn->close(); ?>
