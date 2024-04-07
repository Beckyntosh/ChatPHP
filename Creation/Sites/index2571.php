<?php
// Handle the mortgage calculation if data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loanAmount']) && isset($_POST['interestRate']) && isset($_POST['loanTerm'])) {
    $loanAmount = $_POST['loanAmount'];
    $annualInterestRate = $_POST['interestRate'];
    $loanTerm = $_POST['loanTerm'];

    $monthlyInterestRate = $annualInterestRate / 12 / 100;
    $totalPayments = $loanTerm * 12;

    // Mortgage calculation
    $monthlyPayment = $loanAmount * ($monthlyInterestRate * pow((1 + $monthlyInterestRate), $totalPayments)) / (pow((1 + $monthlyInterestRate), $totalPayments) - 1);

    // Connect to the database
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

    // Sql to create table if doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS MortgageCalculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loanAmount DECIMAL(10, 2) NOT NULL,
    interestRate DECIMAL(4, 2) NOT NULL,
    loanTerm INT(4) NOT NULL,
    monthlyPayment DECIMAL(10, 2) NOT NULL,
    calculationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Insert calculation into the table
        $stmt = $conn->prepare("INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ddid", $loanAmount, $annualInterestRate, $loanTerm, $monthlyPayment);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    } else {
        echo "Error creating table: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Mortgage Repayment Calculator</title>
</head>
<body>
<h2>Mortgage Payment Calculator</h2>
<form method="post">
  Loan Amount: <input type="number" step="0.01" name="loanAmount" required><br>
  Interest Rate: <input type="number" step="0.01" name="interestRate" required> %<br>
  Loan Term: <input type="number" name="loanTerm" required> years<br>
  <input type="submit" value="Calculate">
</form>

<?php
// Show calculated payment if exists
if (isset($monthlyPayment)) {
    echo "<h3>Monthly Payment: $" . number_format($monthlyPayment, 2) . "</h3>";
}
?>
</body>
</html>
