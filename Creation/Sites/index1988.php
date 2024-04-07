<!DOCTYPE html>
<html>
<head>
    <title>Mortgage Repayment Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 400px; margin: auto; }
        .input-group { margin-bottom: 10px; }
        .input-group label { display: block; }
        .input-group input { width: 100%; padding: 8px; }
        button { padding: 10px; width: 100%; background-color: #007bff; color: white; border: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mortgage Calculator</h2>
        <form action="index.php" method="post">
            <div class="input-group">
                <label>Loan Amount ($):</label>
                <input type="number" name="amount" required>
            </div>
            <div class="input-group">
                <label>Interest Rate (%):</label>
                <input type="number" step="0.01" name="interest" required>
            </div>
            <div class="input-group">
                <label>Term (Years):</label>
                <input type="number" name="term" required>
            </div>
            <button type="submit" name="calculate">Calculate</button>
        </form>

        <?php
        if(isset($_POST['calculate'])) {
            $loanAmount = $_POST['amount'];
            $annualInterestRate = $_POST['interest'];
            $termYears = $_POST['term'];

            $monthlyInterestRate = ($annualInterestRate / 100) / 12;
            $totalPayments = $termYears * 12;

            $monthlyPayment = $loanAmount * $monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$totalPayments));

            echo "<p>Monthly Payment: $" . number_format($monthlyPayment, 2) . "</p>";
        }
        ?>

    </div>

    <?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS MortgageCalculations (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                loan_amount DECIMAL(10, 2) NOT NULL,
                interest_rate DECIMAL(5, 2) NOT NULL,
                term_years INT(5) NOT NULL,
                monthly_payment DECIMAL(10, 2) NOT NULL,
                calc_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

        $conn->exec($sql);

        if(isset($_POST['calculate'])) {
            $stmt = $conn->prepare("INSERT INTO MortgageCalculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (:loan_amount, :interest_rate, :term_years, :monthly_payment)");
            $stmt->bindParam(':loan_amount', $loanAmount);
            $stmt->bindParam(':interest_rate', $annualInterestRate);
            $stmt->bindParam(':term_years', $termYears);
            $stmt->bindParam(':monthly_payment', $monthlyPayment);

            $stmt->execute();
        }

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

</body>
</html>
