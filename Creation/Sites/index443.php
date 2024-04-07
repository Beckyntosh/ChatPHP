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

// Check for POST request to calculate debt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = $_POST['principal'] ?? 0;
    $interestRate = ($_POST['interest_rate'] ?? 0) / 100;
    $monthlyPayment = $_POST['monthly_payment'] ?? 0;
    
    if ($principal <= 0 || $interestRate <= 0 || $monthlyPayment <= 0 || $monthlyPayment < ($principal * $interestRate / 12)) {
        $message = "Invalid input or payment is too low!";
        $totalMonths = 0;
    } else {
        $totalInterest = 0;
        $totalMonths = 0;
        while ($principal > 0) {
            $monthlyInterest = ($principal * $interestRate) / 12;
            $totalInterest += $monthlyInterest;
            $principal = ($principal + $monthlyInterest) - $monthlyPayment;
            $totalMonths++;
        }
        $message = "You will be debt-free in $totalMonths months with total interest paid as $" . number_format($totalInterest, 2);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Debt Repayment Calculator</title>
    <style>
        body {font-family: Arial, sans-serif;margin: 20px;padding: 20px;}
        .container {margin-top: 20px;}
    </style>
</head>
<body>

<h2>Debt Repayment Calculator</h2>

<form method="post">
    <label for="principal">Debt Amount:</label><br>
    <input type="number" id="principal" name="principal" required><br>
    <label for="interest_rate">Annual Interest Rate (%):</label><br>
    <input type="number" step="0.01" id="interest_rate" name="interest_rate" required><br>
    <label for="monthly_payment">Monthly Payment:</label><br>
    <input type="number" id="monthly_payment" name="monthly_payment" required><br><br>
    <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<div class='container'>";
    echo "<p>$message</p>";
    echo "</div>";
}
?>

</body>
</html>

<?php
$conn->close();
?>