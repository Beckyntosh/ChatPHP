<?php
// Connection Data
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
$table_sql = "CREATE TABLE IF NOT EXISTS DebtRepaymentPlan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    principal FLOAT NOT NULL,
    interestRate FLOAT NOT NULL,
    monthlyPayment FLOAT NOT NULL,
    payoffTime TEXT NOT NULL
    )";

if ($conn->query($table_sql) === TRUE) {
    echo "Table DebtRepaymentPlan created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// HTML and PHP for the Debt Repayment Calculator frontend and logic
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Debt Repayment Calculator</title>
</head>
<body>
    <h2>Debt Repayment Calculator</h2>
    <form action="" method="post">
        <label for="principal">Principal Amount ($):</label><br>
        <input type="text" id="principal" name="principal" required><br>
        <label for="interestRate">Annual Interest Rate (%):</label><br>
        <input type="text" id="interestRate" name="interestRate" required><br>
        <label for="monthlyPayment">Monthly Payment ($):</label><br>
        <input type="text" id="monthlyPayment" name="monthlyPayment" required><br>
        <input type="submit" name="calculate" value="Calculate">
    </form>

<?php
if (isset($_POST['calculate'])) {
    $principal = $_POST['principal'];
    $interestRate = $_POST['interestRate'];
    $monthlyPayment = $_POST['monthlyPayment'];

    if ($monthlyPayment <= ($principal * ($interestRate / 1200))) {
        echo "Monthly payment is too low. You will never pay off your debt.";
    } else {
        $months = ceil(log($monthlyPayment / ($monthlyPayment - $principal * $interestRate / 1200)) / log(1 + $interestRate / 1200));
        $payoffTime = "It will take you " . $months . " months to pay off your debt.";

        echo $payoffTime;

        // Insert data into table
        $insert_sql = "INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("fffs", $principal, $interestRate, $monthlyPayment, $payoffTime);

        if ($stmt->execute() === TRUE) {
            echo " New record created successfully";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
        
        $stmt->close();
    }
}
$conn->close();
?>
</body>
</html>