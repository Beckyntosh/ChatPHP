// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: Groceries Style: synchronous
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
$table_query = "CREATE TABLE IF NOT EXISTS mortgage_calculations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
loan_amount DOUBLE,
interest_rate DOUBLE,
loan_term INT,
monthly_payment DOUBLE,
calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($table_query)) {
  echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $loan_amount = $_POST['loan_amount'];
  $interest_rate = $_POST['interest_rate'];
  $loan_term = $_POST['loan_term'];
  
  // Calculate monthly payment
  $monthly_rate = $interest_rate / 1200;
  $term_in_months = $loan_term * 12;
  
  $monthly_payment = $loan_amount * $monthly_rate / (1 - (pow(1/(1 + $monthly_rate), $term_in_months)));
  
  // Insert into database
  $insert_query = "INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment)
  VALUES ('$loan_amount', '$interest_rate', '$loan_term', '$monthly_payment')";
  
  if ($conn->query($insert_query) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_query . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Mortgage Repayment Calculator</title>
</head>
<body>

<h2>Mortgage Calculator</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Loan Amount: <input type="number" name="loan_amount" required><br><br>
  Interest Rate (%): <input type="number" step="0.01" name="interest_rate" required><br><br>
  Loan Term (years): <input type="number" name="loan_term" required><br><br>
  <input type="submit" value="Calculate">
</form>

</body>
</html>
