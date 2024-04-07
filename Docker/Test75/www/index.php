// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: Herbal Supplements Style: expert-level
<?php
// Define MySQL connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Establish a MySQL database connection
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create a table for storing user mortgage calculation inputs if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  loan_amount DECIMAL(10, 2),
  interest_rate DECIMAL(5, 3),
  term_years INT,
  monthly_payment DECIMAL(10, 2),
  calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect post data
  $loan_amount = $_POST['loan_amount'];
  $interest_rate = $_POST['interest_rate'];
  $term_years = $_POST['term_years'];

  // Calculate monthly payment
  $monthly_rate = ($interest_rate / 100) / 12;
  $term_months = $term_years * 12;
  $monthly_payment = $loan_amount * $monthly_rate / (1 - pow(1 + $monthly_rate, -$term_months));

  // Prepare an insert statement
  $stmt = $conn->prepare("INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ddid", $loan_amount, $interest_rate, $term_years, $monthly_payment);
  $stmt->execute();
  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mortgage Repayment Calculator</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: auto; }
    form { display: flex; flex-direction: column; }
    label { margin-top: 10px; }
    input { margin-top: 5px; }
    button { margin-top: 20px; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Mortgage Repayment Calculator</h1>
    <form action="" method="post">
      <label for="loan_amount">Loan Amount ($):</label>
      <input type="number" id="loan_amount" name="loan_amount" required>

      <label for="interest_rate">Interest Rate (%):</label>
      <input type="number" step="0.01" id="interest_rate" name="interest_rate" required>

      <label for="term_years">Term (years):</label>
      <input type="number" id="term_years" name="term_years" required>

      <button type="submit">Calculate</button>
    </form>
    <?php if (isset($monthly_payment)) : ?>
      <h2>Monthly Payment: $<?= number_format($monthly_payment, 2) ?></h2>
    <?php endif; ?>
  </div>
</body>
</html>

<?php $conn->close(); ?>
