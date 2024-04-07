<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Create the table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10, 2) NOT NULL,
    interest_rate DECIMAL(4, 2) NOT NULL,
    term_years INT NOT NULL,
    monthly_payment DECIMAL(10, 2) NOT NULL,
    calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$pdo->exec($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = $_POST['loanAmount'] ?? 0;
    $interestRate = $_POST['interestRate'] ?? 0;
    $termYears = $_POST['termYears'] ?? 0;

    // Calculate the monthly payment
    $monthlyRate = $interestRate / 100 / 12;
    $termMonths = $termYears * 12;
    $monthlyPayment = $loanAmount * $monthlyRate / (1 - (pow(1/(1 + $monthlyRate), $termMonths)));

    // Insert calculation to database
    $sqlInsert = "INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sqlInsert);
    $stmt->execute([$loanAmount, $interestRate, $termYears, $monthlyPayment]);
    
    $calculated = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Mortgage Calculator</title>
<style>
body { font-family: Arial, sans-serif; }
.container { max-width: 500px; margin: auto; padding: 20px; }
input[type="number"], button { width: 100%; padding: 10px; margin: 5px 0 20px 0; }
button { background-color: #4CAF50; color: white; }
</style>
</head>
<body>

<div class="container">
    <h2>Mortgage Repayment Calculator</h2>
    <form action="" method="post">
        <label for="loanAmount">Loan Amount ($):</label>
        <input type="number" id="loanAmount" name="loanAmount" required>

        <label for="interestRate">Interest Rate (%):</label>
        <input type="number" step="0.01" id="interestRate" name="interestRate" required>

        <label for="termYears">Term (years):</label>
        <input type="number" id="termYears" name="termYears" required>

        <button type="submit">Calculate</button>
    </form>
    <?php if (!empty($calculated)): ?>
        <h3>Monthly Payment: $<?php echo number_format($monthlyPayment, 2) ?></h3>
    <?php endif; ?>
</div>

</body>
</html>