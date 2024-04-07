<?php
// Set error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
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

// Create table if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10,2),
    interest_rate DECIMAL(5,2),
    term_years INT(3),
    monthly_payment DECIMAL(10,2),
    calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

function calculateMonthlyPayment($loanAmount, $interestRate, $termYears) {
    $monthlyInterestRate = ($interestRate / 100) / 12;
    $termMonths = $termYears * 12;
    $monthlyPayment = $loanAmount * $monthlyInterestRate / (1 - (pow(1/(1 + $monthlyInterestRate), $termMonths)));
    return $monthlyPayment;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = $_POST['loanAmount'];
    $interestRate = $_POST['interestRate'];
    $termYears = $_POST['termYears'];
    
    $monthlyPayment = calculateMonthlyPayment($loanAmount, $interestRate, $termYears);

    $stmt = $conn->prepare("INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddid", $loanAmount, $interestRate, $termYears, $monthlyPayment);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully. Monthly Payment: $" . number_format($monthlyPayment, 2);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mortgage Repayment Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Mortgage Repayment Calculator</h2>
    <form action="" method="post">
        <label for="loanAmount">Loan Amount ($):</label><br>
        <input type="number" id="loanAmount" name="loanAmount" required><br><br>
        <label for="interestRate">Interest Rate (%):</label><br>
        <input type="number" step="0.01" id="interestRate" name="interestRate" required><br><br>
        <label for="termYears">Term (Years):</label><br>
        <input type="number" id="termYears" name="termYears" required><br><br>
        <input type="submit" value="Calculate">
    </form>
</div>
</body>
</html>
