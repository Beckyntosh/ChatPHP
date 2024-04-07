// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: Bath Products Style: rigorous
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mortgage Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input { padding: 10px; margin-top: 5px; }
        .submit { background: #007bff; color: #fff; margin-top: 20px; }
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

            <label for="loanTerm">Loan Term (years):</label>
            <input type="number" id="loanTerm" name="loanTerm" required>
           
            <input type="submit" name="calculate" value="Calculate" class="submit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculate"])) {
            $loanAmount = $_POST["loanAmount"];
            $interestRate = $_POST["interestRate"];
            $loanTerm = $_POST["loanTerm"];
            $monthlyPayment = calculateMortgage($loanAmount, $interestRate, $loanTerm);
            echo "<p>Monthly Payment: $".number_format($monthlyPayment, 2)."</p>";
        }

        function calculateMortgage($loanAmount, $interestRate, $loanTerm) {
            $monthlyRate = $interestRate / 100 / 12;
            $termMonths = $loanTerm * 12;
            return $loanAmount * $monthlyRate / (1 - pow(1 + $monthlyRate, -$termMonths));
        }

        // Database logic
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                loanAmount DECIMAL(10, 2) NOT NULL,
                interestRate DECIMAL(5, 2) NOT NULL,
                loanTerm INT(3) NOT NULL,
                monthlyPayment DECIMAL(10, 2) NOT NULL,
                calculationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            
            $conn->exec($query);

            if(isset($monthlyPayment)) {
                $stmt = $conn->prepare("INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (:loanAmount, :interestRate, :loanTerm, :monthlyPayment)");
                $stmt->execute(['loanAmount' => $loanAmount, 'interestRate' => $interestRate, 'loanTerm' => $loanTerm, 'monthlyPayment' => $monthlyPayment]);
            }

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>
