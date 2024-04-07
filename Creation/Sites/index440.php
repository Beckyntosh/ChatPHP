<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Calculate future value of investment
function calculateFutureValue($principal, $annualRate, $years) {
    $rateDecimal = $annualRate / 100;
    $futureValue = $principal * pow((1 + $rateDecimal), $years);
    return round($futureValue, 2);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = $_POST["principal"];
    $annualRate = $_POST["annualRate"];
    $years = $_POST["years"];

    $futureValue = calculateFutureValue($principal, $annualRate, $years);

    // Insert calculation into database
    $stmt = $conn->prepare("INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddid", $principal, $annualRate, $years, $futureValue);
    $stmt->execute();

    $calculationResult = "Future value of your investment: $" . number_format($futureValue, 2);
} else {
    $calculationResult = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Investment Return Calculator</title>
</head>
<body>
    <h1>Investment Return Calculator</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Initial Investment ($): <input type="number" name="principal" required><br>
        Annual Rate of Return (%): <input type="number" step="0.01" name="annualRate" required><br>
        Time (Years): <input type="number" name="years" required><br>
        <input type="submit" value="Calculate">
    </form>
    <p><?php echo $calculationResult; ?></p>
</body>
</html>

<?php
$conn->close();
?>