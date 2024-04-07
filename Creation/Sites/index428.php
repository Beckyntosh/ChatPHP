<?php
// Check if form was submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Calculator submission logic
    $currentAge = intval($_POST['currentAge']);
    $retirementAge = intval($_POST['retirementAge']);
    $monthlyExpense = floatval($_POST['monthlyExpense']);
    $inflationRate = 0.03; // Assuming a 3% annual inflation rate

    // Calculate years until retirement
    $yearsUntilRetirement = $retirementAge - $currentAge;

    // Adjust monthly expense for inflation
    $futureMonthlyExpense = $monthlyExpense * pow((1 + $inflationRate), $yearsUntilRetirement);

    // Assuming a withdrawal rate of 4% annually
    $annualWithdrawalRate = 0.04;
    $totalSavingsNeeded = $futureMonthlyExpense * 12 / $annualWithdrawalRate;

    // Assuming interest rate of 5% from savings/investments
    $annualInterestRate = 0.05;
    $monthlyInterestRate = $annualInterestRate / 12;

    // Calculate monthly savings required using the future value of an annuity formula
    $monthlySavingsRequired = $totalSavingsNeeded * $monthlyInterestRate / (pow(1 + $monthlyInterestRate, $yearsUntilRetirement * 12) - 1);

    // Database connectivity
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

    // Insert calculation result into database
    $sql = "INSERT INTO retirement_savings (currentAge, retirementAge, monthlyExpense, monthlySavingsRequired)
    VALUES ('$currentAge', '$retirementAge', '$monthlyExpense', '$monthlySavingsRequired')";

    if ($conn->query($sql) === TRUE) {
        $resultMessage = "New record created successfully";
    } else {
        $resultMessage = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $monthlySavingsRequired = 0;
    $resultMessage = "Fill out the form to calculate your required monthly savings for retirement.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Retirement Savings Calculator</title>
</head>
<body>
<h2>Retirement Savings Calculator</h2>
<form method="post">
    Current Age: <input type="number" name="currentAge" required><br>
    Desired Retirement Age: <input type="number" name="retirementAge" required><br>
    Estimated Monthly Expenses Today: <input type="text" name="monthlyExpense" required><br>
    <input type="submit" value="Calculate">
</form>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<p>Monthly Savings Required for Retirement: " . round($monthlySavingsRequired, 2) . "</p>";
    echo "<p>$resultMessage</p>";
}
?>
</body>
</html>