<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mortgage Repayment Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { width: 80%; max-width: 600px; margin: 40px auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; }
        input[type="number"], input[type="submit"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="submit"] { background-color: #5cb85c; color: white; cursor: pointer; }
        input[type="submit"]:hover { background-color: #4cae4c; }
        .result { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mortgage Repayment Calculator</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="loanAmount">Loan Amount ($)</label>
                <input type="number" id="loanAmount" name="loanAmount" required>
            </div>
            <div class="form-group">
                <label for="interestRate">Interest Rate (%)</label>
                <input type="number" step="0.01" id="interestRate" name="interestRate" required>
            </div>
            <div class="form-group">
                <label for="loanTerm">Loan Term (years)</label>
                <input type="number" id="loanTerm" name="loanTerm" required>
            </div>
            <input type="submit" name="calculate" value="Calculate">
        </form>
        <?php
            if(isset($_POST['calculate'])) {
                $loanAmount = $_POST['loanAmount'];
                $interestRate = $_POST['interestRate'];
                $loanTerm = $_POST['loanTerm'];

                $monthlyInterestRate = ($interestRate / 100) / 12;
                $numberOfPayments = $loanTerm * 12;
                
                $monthlyPayment = $loanAmount * ($monthlyInterestRate * pow(1 + $monthlyInterestRate, $numberOfPayments)) / (pow(1 + $monthlyInterestRate, $numberOfPayments) - 1);

                echo '<div class="result">';
                echo 'Your monthly mortgage payment would be: $' . number_format($monthlyPayment, 2);
                echo '</div>';
            }

            $servername = 'db';
            $username = 'root';
            $password = 'root';
            $dbname = 'my_database';

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "CREATE TABLE IF NOT EXISTS MortgageCalculations (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    loanAmount DECIMAL(10, 2) NOT NULL,
                    interestRate DECIMAL(5, 2) NOT NULL,
                    loanTerm INT(3) NOT NULL,
                    monthlyPayment DECIMAL(10, 2) NOT NULL,
                    calcDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";

                $conn->exec($sql);
                
                if(isset($_POST['calculate'])) {
                    $stmt = $conn->prepare("INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (:loanAmount, :interestRate, :loanTerm, :monthlyPayment)");
                    $stmt->execute(array(':loanAmount' => $loanAmount, ':interestRate' => $interestRate, ':loanTerm' => $loanTerm, ':monthlyPayment' => $monthlyPayment));
                }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        ?>
    </div>
</body>
</html>