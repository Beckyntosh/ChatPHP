<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
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

    // Retrieve input values
    $loanAmount = $_POST['loanAmount'];
    $interestRate = $_POST['interestRate'];
    $loanTerm = $_POST['loanTerm'];

    // Calculate monthly payment
    $monthlyInterestRate = ($interestRate / 100) / 12;
    $numberOfPayments = $loanTerm * 12;
    
    // Monthly mortgage payment formula
    $monthlyPayment = ($loanAmount * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));

    // Save the calculation to the database (optional)
    // You can create a new table for storing calculation history if needed
    $sql = "INSERT INTO `calculations` (`loan_amount`, `interest_rate`, `loan_term`, `monthly_payment`) VALUES ('$loanAmount', '$interestRate', '$loanTerm', '$monthlyPayment')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
} else {
    $monthlyPayment = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mortgage Repayment Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h2 {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border-left: 5px solid #28a745;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Mortgage Repayment Calculator</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="loanAmount">Loan Amount ($):</label>
            <input type="number" id="loanAmount" name="loanAmount" required>
        </div>

        <div class="form-group">
            <label for="interestRate">Interest Rate (%):</label>
            <input type="number" step="0.01" id="interestRate" name="interestRate" required>
        </div>

        <div class="form-group">
            <label for="loanTerm">Loan Term (years):</label>
            <input type="number" id="loanTerm" name="loanTerm" required>
        </div>

        <button type="submit">Calculate</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="result">
            <p>Monthly Payment: $<?php echo number_format($monthlyPayment, 2); ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
