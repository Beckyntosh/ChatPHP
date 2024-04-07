
<!DOCTYPE html>
<html>
<head>
    <title>Loan Amortization Calculator</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; background-color: #fdf6e3; }
        table { width: 60%; border-collapse: collapse; margin: 50px auto; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #8b4513; color: white; }
        td { background-color: #fff8dc; }
        h2 { text-align: center; font-family: 'Verdana', sans-serif; color: #a52a2a; }
    </style>
</head>
<body>
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

// Variable Declaration
$loanAmount = 10000; // Example Loan Amount
$loanDuration = 5; // Duration in years
$annualInterestRate = 5.5; // Annual interest rate

$monthlyInterestRate = $annualInterestRate / 12 / 100;
$numberOfPayments = $loanDuration * 12;

$monthlyPayment = $loanAmount * $monthlyInterestRate / (1 - (pow(1/(1 + $monthlyInterestRate), $numberOfPayments)));
?>
<h2>Loan Amortization Schedule</h2>
<table>
    <tr>
        <th>Month</th>
        <th>Principal</th>
        <th>Interest</th>
        <th>Total Payment</th>
        <th>Balance</th>
    </tr>
    <?php
    $currentBalance = $loanAmount;
    for ($i = 1; $i <= $numberOfPayments; ++$i) {
        $interest = $currentBalance * $monthlyInterestRate;
        $principal = $monthlyPayment - $interest;
        $currentBalance = $currentBalance - $principal;
        echo "<tr>
                <td>" . $i . "</td>
                <td>" . number_format($principal, 2) . "</td>
                <td>" . number_format($interest, 2) . "</td>
                <td>" . number_format($monthlyPayment, 2) . "</td>
                <td>" . number_format($currentBalance, 2) . "</td>
              </tr>";
    }
    ?>
</table>
</body>
</html>
<?php
$conn->close();
?>
