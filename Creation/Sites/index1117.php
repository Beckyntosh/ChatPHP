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

// Create table for exchange rates if not exists
$sql = "CREATE TABLE IF NOT EXISTS exchange_rates (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  currency VARCHAR(3) NOT NULL,
  rate DECIMAL(10, 4) NOT NULL,
  reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Example exchange rates, USD to EUR
$usdToEurRate = 0.95; // Example rate, 1 USD = 0.95 EUR
$eurToUsdRate = 1.05; // Example rate, 1 EUR = 1.05 USD

// Insert example rates into the database
$sql = "INSERT INTO exchange_rates (currency, rate) VALUES ('USDEUR', $usdToEurRate), ('EURUSD', $eurToUsdRate)";
if (!$conn->query($sql) === TRUE) {
  echo "Error inserting rates: " . $conn->error;
}

// Fetching the exchange rate from the database
$sql = "SELECT rate FROM exchange_rates WHERE currency='USDEUR'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $usdToEurRate = $row["rate"];
  }
} else {
  echo "0 results";
}

$conn->close();


$convertedAmount = 0;
$conversionRate = $usdToEurRate; // default conversion rate from USD to EUR
$amountToConvert = isset($_POST['amount']) ? $_POST['amount'] : 0;
$currency = isset($_POST['currency']) ? $_POST['currency'] : 'USDEUR';

// Calculate conversion
if ($currency == 'USDEUR') {
    $convertedAmount = $amountToConvert * $conversionRate;
} elseif ($currency == 'EURUSD') {
    $convertedAmount = $amountToConvert / $conversionRate;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Converter</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        form { margin-top: 20px; }
        input, select, button { padding: 10px; margin: 10px 0; width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Currency Converter</h2>
        <form action="" method="post">
            <input type="number" name="amount" placeholder="Amount in USD" required>
            <select name="currency">
                <option value="USDEUR">USD to EUR</option>
                <option value="EURUSD">EUR to USD</option>
            </select>
            <button type="submit">Convert</button>
        </form>
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <h3>Converted Amount: <?=number_format($convertedAmount, 2)?> </h3>
        <?php endif; ?>
    </div>
</body>
</html>
