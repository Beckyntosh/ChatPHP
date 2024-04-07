<?php
// Connect to database
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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS loan_amortization (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    payment_date DATE NOT NULL,
    payment_amount DECIMAL(10, 2) NOT NULL,
    principal_amount DECIMAL(10, 2) NOT NULL,
    interest_amount DECIMAL(10, 2) NOT NULL,
    balance DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = $_POST['loanAmount'];
    $interestRate = $_POST['interestRate'];
    $loanTerm = $_POST['loanTerm']; // In years

    // Calculate the monthly payment
    $monthlyInterestRate = ($interestRate / 100) / 12;
    $totalPayments = $loanTerm * 12;
    
    $monthlyPayment = $loanAmount * ($monthlyInterestRate / (1 - pow((1 + $monthlyInterestRate), -$totalPayments)));
  
  // Insert calculated payments into the database
  for ($i = 0; $i < $totalPayments; $i++) {
      // Calculate balance and interest
      $interest = $loanAmount * $monthlyInterestRate;
      $principal = $monthlyPayment - $interest;
      $loanAmount -= $principal;
      $payment_date = date("Y-m-d", strtotime("+".$i." month"));

      $insertSQL = "INSERT INTO loan_amortization (payment_date, payment_amount, principal_amount, interest_amount, balance) VALUES ('$payment_date', '$monthlyPayment', '$principal', '$interest', '$loanAmount')";

      if (!$conn->query($insertSQL) === TRUE){
          echo "Error: " . $insertSQL . "<br>" . $conn->error;
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loan Amortization Calculator</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h2>Loan Amortization Calculator</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Loan Amount: <input type="text" name="loanAmount">
    Interest Rate (%): <input type="text" name="interestRate">
    Loan Term (years): <input type="text" name="loanTerm">
    <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Display the amortization schedule
    $fetchSQL = "SELECT * FROM loan_amortization ORDER BY payment_date DESC";
    $result = $conn->query($fetchSQL);
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Payment Date</th><th>Payment Amount</th><th>Principal Amount</th><th>Interest Amount</th><th>Balance</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["payment_date"]."</td><td>".$row["payment_amount"]."</td><td>".$row["principal_amount"]."</td><td>".$row["interest_amount"]."</td><td>".$row["balance"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
$conn->close();
?>
</body>
</html>