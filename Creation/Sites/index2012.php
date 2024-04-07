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
$sql = "CREATE TABLE IF NOT EXISTS DebtRepayment (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
debtAmount DECIMAL(10,2) NOT NULL,
interestRate DECIMAL(5,2) NOT NULL,
monthlyPayment DECIMAL(10,2) NOT NULL,
repaymentPeriodMonths INT(11),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Silent on success
} else {
  echo "Error creating table: " . $conn->error;
}

// Calculate and insert data if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $debtAmount = $_POST['debtAmount'];
    $interestRate = $_POST['interestRate'];
    $monthlyPayment = $_POST['monthlyPayment'];

    $interestRateMonthly = $interestRate / 12 / 100;
    $n = log($monthlyPayment / ($monthlyPayment - $debtAmount * $interestRateMonthly)) / log(1 + $interestRateMonthly);
    $repaymentPeriodMonths = ceil($n);
    
    $sql = "INSERT INTO DebtRepayment (debtAmount, interestRate, monthlyPayment, repaymentPeriodMonths)
    VALUES ('$debtAmount', '$interestRate', '$monthlyPayment', '$repaymentPeriodMonths')";
    
    if ($conn->query($sql) === TRUE) {
      echo ""; // Silent on success
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Debt Repayment Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; }
        input[type="number"], button { padding: 10px; margin-top: 10px; }
        button { cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Debt Repayment Calculator</h2>
        <form action="" method="post">
            <label for="debtAmount">Debt Amount ($):</label><br>
            <input type="number" id="debtAmount" name="debtAmount" required><br>
            <label for="interestRate">Interest Rate (%):</label><br>
            <input type="number" id="interestRate" name="interestRate" step="0.01" required><br>
            <label for="monthlyPayment">Monthly Payment ($):</label><br>
            <input type="number" id="monthlyPayment" name="monthlyPayment" required><br>
            <button type="submit">Calculate</button>
        </form>
    </div>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div class='container'>";
        echo "<h2>Results</h2>";
        echo "<p>Debt Amount: $" . $debtAmount. "</p>";
        echo "<p>Interest Rate: " . $interestRate . "%</p>";
        echo "<p>Monthly Payment: $" . $monthlyPayment . "</p>";
        echo "<p>It will take <strong>" . $repaymentPeriodMonths . " months</strong> to pay off the debt.</p>";
        echo "</div>";
    }
    ?>
</body>
</html>
<?php $conn->close(); ?>
