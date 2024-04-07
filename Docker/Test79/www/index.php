// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: Travel Style: resource intensive
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

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10,2) NOT NULL,
    interest_rate DECIMAL(5,2) NOT NULL,
    term_years INT(3) NOT NULL,
    monthly_payment DECIMAL(10,2) NOT NULL,
    calculation_time TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo "Table mortgage_calculations created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = $_POST['loan_amount'];
    $interestRate = $_POST['interest_rate'];
    $loanTerm = $_POST['loan_term'];

    $monthlyInterestRate = ($interestRate / 100) / 12;
    $numberOfMonths = $loanTerm * 12;
    $partOfEquation = pow(1 + $monthlyInterestRate, $numberOfMonths);
    $monthlyPayment = $loanAmount * ($monthlyInterestRate * $partOfEquation) / ($partOfEquation - 1);

    // Insert calculation into database
    $stmt = $conn->prepare("INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddid", $loanAmount, $interestRate, $loanTerm, $monthlyPayment);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mortgage Repayment Calculator</title>
</head>

<body>
    <h1>Mortgage Repayment Calculator</h1>
    <form action="" method="post">
        <label for="loan_amount">Loan amount:</label>
        <input type="number" id="loan_amount" name="loan_amount" required><br><br>
        <label for="interest_rate">Interest Rate (%):</label>
        <input type="text" id="interest_rate" name="interest_rate" required><br><br>
        <label for="loan_term">Loan Term (years):</label>
        <input type="number" id="loan_term" name="loan_term" required><br><br>
        <input type="submit" value="Calculate">
    </form>
    <?php
    if (isset($monthlyPayment)) {
        echo "<h2>Monthly Payment: $". number_format($monthlyPayment, 2)."</h2>";
    }
    ?>
</body>

</html>
