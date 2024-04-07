// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: Sporting Goods Style: peaceful
<?php
// Set up connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = $_POST['loanAmount'];
    $interestRate = $_POST['interestRate'];
    $loanTerm = $_POST['loanTerm'];
    
    $monthlyInterestRate = ($interestRate / 100) / 12;
    $numberOfPayments = $loanTerm * 12;

    // Calculate monthly repayment
    $monthlyRepayment = $loanAmount * 
                        ($monthlyInterestRate * pow((1 + $monthlyInterestRate), $numberOfPayments)) / 
                        (pow((1 + $monthlyInterestRate), $numberOfPayments) - 1);

    // Insert into the database
    $sql = "INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyRepayment) VALUES (:loanAmount, :interestRate, :loanTerm, :monthlyRepayment)";
    
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":loanAmount", $loanAmount, PDO::PARAM_STR);
        $stmt->bindParam(":interestRate", $interestRate, PDO::PARAM_STR);
        $stmt->bindParam(":loanTerm", $loanTerm, PDO::PARAM_STR);
        $stmt->bindParam(":monthlyRepayment", $monthlyRepayment, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "<script>alert('Mortgage calculation saved!');</script>";
        } else {
            echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }

        unset($stmt);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mortgage Repayment Calculator</title>
    <style>
    body {font-family: Arial, sans-serif; background-color: #f0f8ff; color: #333;}
    .calculator {margin-top: 20px; padding: 20px; background-color: #e6eef7; border-radius: 15px; width: 300px; margin-left: auto; margin-right: auto;}
    label, input {margin-top: 5px; margin-bottom: 15px; display: block;}
    input[type=submit] {background-color: #4caf50; color: white; border: none; padding: 10px;}
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Mortgage Repayment Calculator</h2>
        <form action="" method="post">
            <label for="loanAmount">Loan Amount ($)</label>
            <input type="number" id="loanAmount" name="loanAmount" required>

            <label for="interestRate">Interest Rate (%)</label>
            <input type="number" step="0.01" id="interestRate" name="interestRate" required>

            <label for="loanTerm">Loan Term (years)</label>
            <input type="number" id="loanTerm" name="loanTerm" required>

            <input type="submit" value="Calculate">
        </form>
    </div>
</body>
</html>
<?php
// Close connection
unset($pdo);
?>
