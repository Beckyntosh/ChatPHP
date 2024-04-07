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

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  loan_amount DECIMAL(10,2),
  interest_rate DECIMAL(5,2),
  loan_term INT,
  monthly_payment DECIMAL(10,2),
  calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql)) {
    echo "Error creating table: " . $conn->error;
}

function calculateMortgage($loanAmount, $interestRate, $loanTerm, $conn) {
    $monthlyRate = $interestRate / (12 * 100);
    $termInMonths = $loanTerm * 12;
    $monthlyPayment = $loanAmount * $monthlyRate / (1 - pow(1 + $monthlyRate, -$termInMonths));
    
    $insert_sql = "INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("dddi", $loanAmount, $interestRate, $loanTerm, $monthlyPayment);
    $stmt->execute();
    
    return $monthlyPayment;
}

$loanAmount = $interestRate = $loanTerm = $monthlyPayment = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = $_POST["loanAmount"];
    $interestRate = $_POST["interestRate"];
    $loanTerm = $_POST["loanTerm"];
    $monthlyPayment = calculateMortgage($loanAmount, $interestRate, $loanTerm, $conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mortgage Repayment Calculator</title>
</head>
<body>

<h2>Mortgage Repayment Calculator</h2>

<form method="post" action="">
    Loan amount: <input type="number" name="loanAmount" value="<?php echo $loanAmount; ?>"><br>
    Interest rate: <input type="text" name="interestRate" value="<?php echo $interestRate; ?>"><br>
    Loan term (years): <input type="number" name="loanTerm" value="<?php echo $loanTerm; ?>"><br>
    <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h4>Monthly Payment: $" . number_format($monthlyPayment, 2) . "</h4>";
}
?>

</body>
</html>

<?php $conn->close(); ?>
