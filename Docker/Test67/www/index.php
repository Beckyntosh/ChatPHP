// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: Art Supplies Style: imaginative
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mortgage Repayment Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e6f6;
            color: #333;
            text-align: center;
            margin-top: 50px;
        }
        .calculator {
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px #ccc;
            display: inline-block;
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .result {
            font-size: 20px;
            color: #d04;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Mortgage Repayment Calculator</h2>
    <form action="" method="post">
        <label for="loanAmount">Loan Amount ($)</label>
        <input type="text" id="loanAmount" name="loanAmount" required>

        <label for="interestRate">Interest Rate (%)</label>
        <input type="text" id="interestRate" name="interestRate" required>

        <label for="loanTerm">Loan Term (years)</label>
        <input type="text" id="loanTerm" name="loanTerm" required>

        <input type="submit" value="Calculate">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $loanAmount = $_POST['loanAmount'];
        $interestRate = $_POST['interestRate'];
        $loanTerm = $_POST['loanTerm'];

        $monthlyRate = ($interestRate / 100) / 12;
        $termInMonths = $loanTerm * 12;

        $monthlyPayment = ($loanAmount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$termInMonths));

        echo "<p class='result'>Monthly Payment: $" . number_format($monthlyPayment, 2) . "</p>";
    }

    // Database connection
    $hostname = 'db';
    $username = 'root';
    $password = 'root';
    $database = 'my_database';

    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            loanAmount DECIMAL(10, 2) NOT NULL,
            interestRate DECIMAL(5, 2) NOT NULL,
            loanTerm INT(6) NOT NULL,
            monthlyPayment DECIMAL(10, 2) NOT NULL,
            calcDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

        $pdo->exec($sql);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment)
                VALUES (:loanAmount, :interestRate, :loanTerm, :monthlyPayment)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':loanAmount'     => $loanAmount,
                ':interestRate'   => $interestRate,
                ':loanTerm'       => $loanTerm,
                ':monthlyPayment' => $monthlyPayment,
            ]);
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
    ?>
</div>

</body>
</html>
