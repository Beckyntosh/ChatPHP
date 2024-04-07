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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS MortgageCalculator (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
loan_amount DOUBLE NOT NULL,
interest_rate DOUBLE NOT NULL,
loan_term INT(11) NOT NULL,
monthly_payment DOUBLE NOT NULL,
calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Calculate mortgage if form was submitted
$loanAmount = $_POST['loanAmount'] ?? '';
$interestRate = $_POST['interestRate'] ?? '';
$loanTerm = $_POST['loanTerm'] ?? '';
$monthlyPayment = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = $loanAmount;
    $monthlyInterestRate = ($interestRate / 100) / 12;
    $numberOfPayments = $loanTerm * 12;
    $monthlyPayment = $principal * ($monthlyInterestRate * pow(1 + $monthlyInterestRate, $numberOfPayments)) / (pow(1 + $monthlyInterestRate, $numberOfPayments) - 1);
    
    // Insert calculation into database
    $stmt = $conn->prepare("INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddid", $loanAmount, $interestRate, $loanTerm, $monthlyPayment);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mortgage Repayment Calculator</title>
</head>
<body>
    <h2>Mortgage Repayment Calculator</h2>
    <form action="" method="post">
        <label for="loanAmount">Loan Amount:</label>
        <input type="number" id="loanAmount" name="loanAmount" required><br><br>
        <label for="interestRate">Interest Rate:</label>
        <input type="number" step="0.01" id="interestRate" name="interestRate" required><br><br>
        <label for="loanTerm">Loan Term (years):</label>
        <input type="number" id="loanTerm" name="loanTerm" required><br><br>
        <input type="submit" value="Calculate">
    </form>

<?php
if($monthlyPayment > 0){
    echo "<p>Monthly Payment: $".number_format($monthlyPayment, 2)."</p>";
}
?>

</body>
</html>

<?php
$conn->close();
?>
