// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: Bicycles Style: light-weight
<?php

// Define database connection parameters
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Establish connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the mortage_calculation table exists, if not create it
$sql = "CREATE TABLE IF NOT EXISTS mortgage_calculation (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DOUBLE NOT NULL,
    interest_rate DOUBLE NOT NULL,
    loan_term INT NOT NULL,
    monthly_payment DOUBLE NOT NULL,
    calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Function to calculate monthly mortgage payment
function calculateMonthlyPayment($loanAmount, $interestRate, $loanTerm) {
    $monthlyInterestRate = $interestRate / 1200;
    $numberOfPayments   = $loanTerm * 12;
    $part1 = pow((1 + $monthlyInterestRate), $numberOfPayments);
    return ($loanAmount * $monthlyInterestRate * $part1) / ($part1 - 1);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $loanAmount = $_POST['loanAmount'];
    $interestRate = $_POST['interestRate'];
    $loanTerm = $_POST['loanTerm'];

    // Calculate monthly payment
    $monthlyPayment = calculateMonthlyPayment($loanAmount, $interestRate, $loanTerm);

    // Insert calculation into database
    $stmt = $conn->prepare("INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddid", $loanAmount, $interestRate, $loanTerm, $monthlyPayment);
    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mortgage Repayment Calculator</title>
</head>
<body>
    <h1>Mortgage Repayment Calculator</h1>
    <form action="" method="post">
        <label for="loanAmount">Loan Amount:</label>
        <input type="number" id="loanAmount" name="loanAmount" required><br><br>

        <label for="interestRate">Interest Rate:</label>
        <input type="text" id="interestRate" name="interestRate" required><br><br>

        <label for="loanTerm">Loan Term (in years):</label>
        <input type="number" id="loanTerm" name="loanTerm" required><br><br>

        <input type="submit" value="Calculate">
    </form>

</body>
</html>
