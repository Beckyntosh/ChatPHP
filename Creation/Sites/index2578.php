<?php
$errorMessage = '';
$monthlyPayment = '';
$loanAmount = '';
$annualInterestRate = '';
$loanPeriod = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = $_POST['amount'];
    $annualInterestRate = $_POST['interest'];
    $loanPeriod = $_POST['period'];

    if (!is_numeric($loanAmount) || !is_numeric($annualInterestRate) || !is_numeric($loanPeriod)) {
        $errorMessage = 'Please enter numbers only.';
    } else {
        $monthlyInterestRate = $annualInterestRate / 100 / 12;
        $numberOfPayments = $loanPeriod * 12;
        $part1 = pow((1 + $monthlyInterestRate), $numberOfPayments);
        $monthlyPayment = ($loanAmount * $monthlyInterestRate * $part1) / ($part1 - 1);
        $monthlyPayment = round($monthlyPayment, 2);
    }
}

// Database Connection
$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Create connection
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table
$tableSql = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
loanAmount DECIMAL(10, 2) NOT NULL,
annualInterestRate DECIMAL(4,2) NOT NULL,
loanPeriod INT(3) NOT NULL,
monthlyPayment DECIMAL(10, 2) NOT NULL,
calculationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    if ($monthlyPayment) {
        $insertSql = $conn->prepare("INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (?, ?, ?, ?)");
        $insertSql->bind_param("ddid", $loanAmount, $annualInterestRate, $loanPeriod, $monthlyPayment);
        $insertSql->execute();
        $insertSql->close();
    }
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mortgage Repayment Calculator</title>
    <style>
        /* Simple CSS for presentation */
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px auto; max-width: 600px; }
        .form-control { margin-bottom: 10px; }
        .form-control label { display: block; }
        .form-control input { width: 100%; padding: 10px; }
        .button { padding: 10px 20px; cursor: pointer; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>Mortgage Repayment Calculator</h2>
    <?php if ($errorMessage): ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-control">
            <label for="amount">Loan Amount ($)</label>
            <input type="text" id="amount" name="amount" value="<?php echo $loanAmount; ?>" required>
        </div>
        <div class="form-control">
            <label for="interest">Annual Interest Rate (%)</label>
            <input type="text" id="interest" name="interest" value="<?php echo $annualInterestRate; ?>" required>
        </div>
        <div class="form-control">
            <label for="period">Loan Period (Years)</label>
            <input type="text" id="period" name="period" value="<?php echo $loanPeriod; ?>" required>
        </div>
        <input type="submit" class="button" value="Calculate">
    </form>
    <?php if ($monthlyPayment): ?>
        <p>Monthly Payment: $<?php echo $monthlyPayment; ?></p>
    <?php endif; ?>
</div>
</body>
</html>
