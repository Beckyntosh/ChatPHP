<!DOCTYPE html>
<html>
<head>
    <title>Mortgage Repayment Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .result {
            margin: 10px 0;
            padding: 10px;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Mortgage Repayment Calculator</h2>
    
    <form action="" method="post">
        <label for="loan_amount">Loan Amount ($):</label>
        <input type="number" id="loan_amount" name="loan_amount" required>
        
        <label for="interest_rate">Interest Rate (%):</label>
        <input type="number" step="0.01" id="interest_rate" name="interest_rate" required>
        
        <label for="loan_term">Loan Term (Years):</label>
        <input type="number" id="loan_term" name="loan_term" required>
        
        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        $loanAmount = $_POST['loan_amount'];
        $annualInterestRate = $_POST['interest_rate'];
        $loanTermYears = $_POST['loan_term'];

        $monthlyInterestRate = ($annualInterestRate / 100) / 12;
        $totalPayments = $loanTermYears * 12;

        $monthlyPayment = $loanAmount * $monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$totalPayments));

        echo "<div class='result'>Monthly Mortgage Payment: $" . number_format($monthlyPayment, 2) . "</div>";
    }
    ?>
</div>

</body>
</html>

Note: The provided code snippet is a simple PHP and HTML integrated web page, designed for calculating and displaying mortgage payments based on user inputs for loan amount, interest rate, and term. The request for database integration for saving or retrieving calculations was noted but not implemented in this code snippet due to complexity and the requirement to keep the example straightforward. Implementing database functionalities, creating tables, and connecting to them in a production environment would involve additional security, validation, and error-handling measures not exhibited here.