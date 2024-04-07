<?php
// Connection parameters
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

// Creating table for exchange rates if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exchange_rates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    currency_code VARCHAR(3) NOT NULL,
    rate DECIMAL(10, 6) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table exchange_rates created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Sample data for exchange rates
$sql = "INSERT INTO exchange_rates (currency_code, rate) VALUES ('EUR', 0.95) ON DUPLICATE KEY UPDATE rate=VALUES(rate)";
$conn->query($sql);

// Function to convert currency
function convertCurrency($amount, $from, $to, $conn) {
    $sql = "SELECT rate FROM exchange_rates WHERE currency_code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $from);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $fromRate = $row['rate'];

    $stmt->bind_param("s", $to);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $toRate = $row['rate'];

    return ($amount/$fromRate) * $toRate;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Currency Converter</title>
</head>
<body>

<h2>Currency Converter</h2>

<form action="" method="post">
    Amount: <input type="text" name="amount" required><br>
    From: 
    <select name="fromCurrency">
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
    </select><br>
    To: 
    <select name="toCurrency">
        <option value="EUR">EUR</option>
        <option value="USD">USD</option>
    </select><br>
    <input type="submit" value="Convert">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $fromCurrency = $_POST['fromCurrency'];
    $toCurrency = $_POST['toCurrency'];

    $convertedAmount = convertCurrency($amount, $fromCurrency, $toCurrency, $conn);
    echo "<h3>Converted Amount: ".number_format($convertedAmount, 2)." $toCurrency</h3>";
}
?>

</body>
</html>

<?php
$conn->close();
?>
