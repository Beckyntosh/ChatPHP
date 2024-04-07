<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mortgage Repayment Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 50%; margin: auto; padding: 20px; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; }
        button { background-color: #4CAF50; color: white; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mortgage Repayment Calculator</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <input type="number" name="loanAmount" placeholder="Loan Amount ($)" required>
            <input type="number" step="0.01" name="interestRate" placeholder="Annual Interest Rate (%)" required>
            <input type="number" name="loanTerm" placeholder="Loan Term (years)" required>
            <button type="submit">Calculate</button>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $loanAmount = $_POST['loanAmount'];
                $annualInterestRate = $_POST['interestRate'];
                $loanTerm = $_POST['loanTerm'];

                $monthlyInterestRate = $annualInterestRate / (12 * 100);
                $numberOfPayments = $loanTerm * 12;

                $monthlyPayment = $loanAmount * $monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));

                echo "<p>Monthly Mortgage Payment: $" . number_format($monthlyPayment, 2) . "</p>";
            }
            
            // Establish database connection
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
                    loanAmount DECIMAL(10,2),
                    interestRate DECIMAL(5,2),
                    loanTerm INT(3),
                    monthlyPayment DECIMAL(10,2),
                    calculationTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

                $conn->exec($sql);

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sql = "INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment)
                            VALUES (:loanAmount, :interestRate, :loanTerm, :monthlyPayment)";

                    $stmt = $conn->prepare($sql);

                    $stmt->bindParam(':loanAmount', $loanAmount);
                    $stmt->bindParam(':interestRate', $annualInterestRate);
                    $stmt->bindParam(':loanTerm', $loanTerm);
                    $stmt->bindParam(':monthlyPayment', $monthlyPayment);

                    $stmt->execute();
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        ?>
    </div>
</body>
</html>
