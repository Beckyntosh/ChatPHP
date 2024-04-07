// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: Bath Products Style: shape shifting


<?php
// Set database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DOUBLE NOT NULL,
    interest_rate DOUBLE NOT NULL,
    loan_term INT NOT NULL,
    monthly_payment DOUBLE NOT NULL,
    calculation_time TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
  echo "Error creating table: " . $conn->error;
}

// Function to calculate monthly payment
function calculateMonthlyPayment($loanAmount, $interestRate, $loanTerm) {
    $monthlyRate = $interestRate / 1200;
    $termInMonths = $loanTerm * 12;
    if ($monthlyRate == 0) { // For 0% interest loans
        return $loanAmount / $termInMonths;
    }
    $monthlyPayment = $loanAmount * $monthlyRate / (1 - pow(1 + $monthlyRate, -$termInMonths));
    return $monthlyPayment;
}

$loanAmount = $interestRate = $loanTerm = $monthlyPayment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $loanAmount = $_POST["loanAmount"];
  $interestRate = $_POST["interestRate"];
  $loanTerm = $_POST["loanTerm"];

  $monthlyPayment = calculateMonthlyPayment($loanAmount, $interestRate, $loanTerm);

  // Insert calculation into database
  $insertQuery = "INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($insertQuery);
  $stmt->bind_param("ddid", $loanAmount, $interestRate, $loanTerm, $monthlyPayment);
  
  if(!$stmt->execute()) {
    echo "Error: " . $stmt->error;
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
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; }
    </style>
</head>
<body>
<div class="container">
    <h2>Mortgage Repayment Calculator</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <p>
            <label for="loanAmount">Loan Amount:</label>
            <input type="number" name="loanAmount" id="loanAmount" required>
        </p>
        <p>
            <label for="interestRate">Interest Rate (%):</label>
            <input type="text" name="interestRate" id="interestRate" required>
        </p>
        <p>
            <label for="loanTerm">Loan Term (years):</label>
            <input type="number" name="loanTerm" id="loanTerm" required>
        </p>
        <p>
            <button type="submit">Calculate</button>
        </p>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <h3>Monthly Payment: $<?php echo number_format($monthlyPayment, 2); ?></h3>
    <?php endif; ?>
</div>
</body>
</html>

Note: This script combines HTML, PHP, and SQL in a single file, which is not a recommended practice for production code due to security and maintainability issues. This code lacks proper validation and sanitation of user input, error handling, and secure database operation (use of environment variables for database credentials, etc.), which are critical for real-world applications.