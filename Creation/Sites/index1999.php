<?php
// Establish database connection
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

// SQL to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS LoanAmortization (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
principal FLOAT,
annual_interest_rate FLOAT,
loan_period_years INT,
monthly_payment FLOAT,
date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table LoanAmortization initialized successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Frontend HTML form
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loan Amortization Calculator</title>
</head>
<body style="font-family:'Courier New', monospace;">
<h2>Loan Amortization Calculator</h2>
<form method="post">
    <label for="principal">Principal Amount:</label>
    <input type="number" id="principal" name="principal" required><br><br>
    <label for="interest">Annual Interest Rate (%):</label>
    <input type="number" step="0.01" id="interest" name="interest" required><br><br>
    <label for="years">Loan Period (Years):</label>
    <input type="number" id="years" name="years" required><br><br>
    <input type="submit" value="Calculate">
</form>

<?php
// Calculate and display amortization schedule
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = $_POST['principal'];
    $annualInterestRate = $_POST['interest'];
    $loanPeriodYears = $_POST['years'];
    $monthlyInterestRate = ($annualInterestRate / 100) / 12;
    $totalPayments = $loanPeriodYears * 12;

    $monthlyPayment = $principal * ($monthlyInterestRate / (1 - (pow(1 + $monthlyInterestRate, -$totalPayments))));

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddid", $principal, $annualInterestRate, $loanPeriodYears, $monthlyPayment);
    $stmt->execute();

    echo "<h3>Amortization Schedule</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Payment Number</th><th>Interest</th><th>Principal</th><th>Balance</th></tr>";

    $balance = $principal;
    for($i = 1; $i <= $totalPayments; $i++) {
        $interest = $balance * $monthlyInterestRate;
        $principalPayment = $monthlyPayment - $interest;
        $balance -= $principalPayment;
        echo "<tr>
                <td>$i</td>
                <td>".number_format($interest,2)."</td>
                <td>".number_format($principalPayment,2)."</td>
                <td>".number_format($balance,2)."</td>
              </tr>";
    }
    echo "</table>";
}

$conn->close();
?>
</body>
</html>
