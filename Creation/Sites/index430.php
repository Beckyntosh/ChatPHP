<?php

// Database configuration
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

// Create table for storing loan calculation results, if not exists
$table = "CREATE TABLE IF NOT EXISTS loan_amortization (
id INT AUTO_INCREMENT PRIMARY KEY,
principal DECIMAL(10,2),
annual_interest_rate DECIMAL(5,2),
years INT,
monthly_payment DECIMAL(10,2),
payment_date DATE,
interest DECIMAL(10,2),
balance DECIMAL(10,2)
)";

if (!$conn->query($table)) {
  echo "Error creating table: " . $conn->error;
}

function calculateMonthlyPayment($principal, $annualInterestRate, $years) {
  $monthlyInterestRate = $annualInterestRate / 12 / 100;
  $numberOfPayments = $years * 12;
  $monthlyPayment = $principal * $monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));
  return $monthlyPayment;
}

function saveAmortizationSchedule($conn, $principal, $annualInterestRate, $years, $monthlyPayment) {
  $remainingBalance = $principal;
  $monthlyInterestRate = $annualInterestRate / 12 / 100;
  $paymentDate = date('Y-m-d');

  for ($i = 0; $i < $years * 12; $i++) {
    $interest = $remainingBalance * $monthlyInterestRate;
    $principalPayment = $monthlyPayment - $interest;
    $remainingBalance -= $principalPayment;
    $paymentDate = date('Y-m-d', strtotime("+1 month", strtotime($paymentDate)));

    $stmt = $conn->prepare("INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ddidddd", $principal, $annualInterestRate, $years, $monthlyPayment, $paymentDate, $interest, $remainingBalance);
    $stmt->execute();
  }
  $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $principal = $_POST['principal'];
  $annualInterestRate = $_POST['annualInterestRate'];
  $years = $_POST['years'];

  $monthlyPayment = calculateMonthlyPayment($principal, $annualInterestRate, $years);
  saveAmortizationSchedule($conn, $principal, $annualInterestRate, $years, $monthlyPayment);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Loan Amortization Calculator</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px;">

<h2>Loan Amortization Calculator</h2>

<form method="post">
  <label for="principal">Principal:</label><br>
  <input type="number" id="principal" name="principal" required><br><br>
  
  <label for="annualInterestRate">Annual Interest Rate (%):</label><br>
  <input type="text" id="annualInterestRate" name="annualInterestRate" required pattern="\d+(\.\d{1,2})?"><br><br>
  
  <label for="years">Loan Term (years):</label><br>
  <input type="number" id="years" name="years" required><br><br>
  
  <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<h3>Loan Details</h3>";
  echo "Principal: $".number_format($principal, 2)."<br>";
  echo "Annual Interest Rate: ".number_format($annualInterestRate, 2)."%<br>";
  echo "Loan Term: $years years<br>";
  echo "Monthly Payment: $".number_format($monthlyPayment, 2)."<br><br>";

  echo "<table border='1'>";
  echo "<tr><th>Payment Date</th><th>Principal</th><th>Interest</th><th>Remaining Balance</th></tr>";

  $query = "SELECT * FROM loan_amortization WHERE principal=$principal AND annual_interest_rate=$annualInterestRate AND years=$years ORDER BY payment_date ASC";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["payment_date"]. "</td><td>$" . number_format($row["principal"], 2). "</td><td>$" . number_format($row["interest"], 2). "</td><td>$" . number_format($row["balance"], 2). "</td></tr>";
    }
  } else {
    echo "0 results";
  }
  echo "</table>";
}
?>

</body>
</html>

<?php
$conn->close();
?>