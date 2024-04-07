<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mortgage Repayment Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #282c34; color: white; }
        .container { width: 80%; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; gap: 10px; }
        input, button { padding: 10px; }
        button { background-color: #61dafb; color: black; cursor: pointer; }
        #result { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Mortgage Repayment Calculator</h2>
    <form id="mortgageForm">
        <input type="number" id="loanAmount" placeholder="Loan amount ($)" required>
        <input type="number" step="0.01" id="interestRate" placeholder="Interest rate (%)" required>
        <input type="number" id="loanTerm" placeholder="Loan term (years)" required>
        <button type="button" onclick="calculateMortgage()">Calculate</button>
    </form>
    <div id="result"></div>
</div>

<script>
    function calculateMortgage() {
        var loanAmount = document.getElementById('loanAmount').value;
        var interestRate = document.getElementById('interestRate').value / 100 / 12;
        var loanTerm = document.getElementById('loanTerm').value * 12;

        var monthlyPayment = (loanAmount * interestRate) / (1 - Math.pow((1 + interestRate), -loanTerm));
        if (!isNaN(monthlyPayment)) {
            var result = `Monthly Payment: $${monthlyPayment.toFixed(2)}`;
            document.getElementById('result').innerHTML = result;
        } else {
            document.getElementById('result').innerHTML = "Please enter valid numbers.";
        }
    }
</script>
</body>
</html>

<?php
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

// SQL to create table if doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS MortgageCalculations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
loan_amount DECIMAL(10,2) NOT NULL,
interest_rate DECIMAL(5,2) NOT NULL,
loan_term INT(6) NOT NULL,
monthly_payment DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
