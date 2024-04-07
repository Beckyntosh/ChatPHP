<?php
// Establish database connection
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

// Check if the table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'mortgage_calculations'";
$tableExists = $conn->query($tableCheckQuery);
if ($tableExists->num_rows == 0) {
    // SQL to create table
    $sql = "CREATE TABLE mortgage_calculations (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        loan_amount DOUBLE NOT NULL,
        interest_rate DOUBLE NOT NULL,
        loan_term_years INT NOT NULL,
        monthly_payment DOUBLE NOT NULL,
        calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
      //echo "Table mortgage_calculations created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = $_POST["loanAmount"];
    $interestRate = $_POST["interestRate"];
    $loanTerm = $_POST["loanTerm"];

    $monthlyInterestRate = ($interestRate / 100) / 12;
    $numberOfPayments = $loanTerm * 12;
    $pow = pow(1 + $monthlyInterestRate, $numberOfPayments);
    $monthlyPayment = ($loanAmount * $pow * $monthlyInterestRate) / ($pow - 1);

    // Insert calculation into database
    $stmt = $conn->prepare("INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddid", $loanAmount, $interestRate, $loanTerm, $monthlyPayment);

    $stmt->execute();

    echo "<p>Monthly Payment: $" . number_format($monthlyPayment, 2) . "</p>";
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Mortgage Calculator</title>
    <style>
        body { text-align: center; font-family: "Arial", sans-serif; }
        container { max-width: 600px; margin: auto; }
        form { margin: 20px 0; }
        input, button { padding: 10px; }
        label { margin-right: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mortgage Repayment Calculator</h1>
        <form action="" method="post">
            <div>
                <label for="loanAmount">Loan Amount ($):</label>
                <input type="number" id="loanAmount" name="loanAmount" required>
            </div>
            <div>
                <label for="interestRate">Interest Rate (%):</label>
                <input type="number" step="0.01" id="interestRate" name="interestRate" required>
            </div>
            <div>
                <label for="loanTerm">Loan Term (Years):</label>
                <input type="number" id="loanTerm" name="loanTerm" required>
            </div>
            <button type="submit">Calculate</button>
        </form>
    </div>
</body>
</html>
