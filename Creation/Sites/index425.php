<?php
// Connection to the database
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

// Create table for exchange rates if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exchange_rates (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
currency_code VARCHAR(3) NOT NULL,
exchange_rate DECIMAL(10, 4) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Sample data for USD to EUR exchange rate, REPLACE this with fetching from a real API
$currencyCode = 'EUR';
$exchangeRate = 0.95; // Example rate, 1 USD = 0.95 EUR

// Insert or update the exchange rate in database
$sql = "INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('$currencyCode', $exchangeRate) ON DUPLICATE KEY UPDATE exchange_rate=$exchangeRate";
if ($conn->query($sql) === TRUE) {
  // Exchange rate inserted or updated successfully
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Currency Converter</title>
    <style>
        body {
            font-family: monospace;
            background-color: #f0f0f0;
            color: #333;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
        }
        input[type=number], select, button {
            font-family: monospace;
            font-size: 16px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>Currency Converter</h2>
    <form action="" method="post">
        <label for="amount">Amount in USD:</label><br>
        <input type="number" id="amount" name="amount" step="0.01" required><br><br>

        <label for="currency">Convert to:</label><br>
        <select name="currency" id="currency">
            <option value="EUR">Euros</option>
Add more currencies as needed
        </select>
        <br><br>
        <button type="submit" name="convert">Convert</button>
    </form>

    <?php
    if (isset($_POST['convert'])) {
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];

        // Fetch the exchange rate for the selected currency
        $sql = "SELECT exchange_rate FROM exchange_rates WHERE currency_code = '$currency'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $exchangeRate = $row['exchange_rate'];
            $convertedAmount = round($amount * $exchangeRate, 2);
            echo "<p><b>$amount USD</b> is approximately <b>$convertedAmount $currency</b>.</p>";
        } else {
            echo "<p>Exchange rate for $currency not found.</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>