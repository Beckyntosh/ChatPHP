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
$sql = "CREATE TABLE IF NOT EXISTS tax_records (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
income FLOAT,
deductions FLOAT,
filing_status VARCHAR(30),
tax_owed FLOAT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

$income = $deductions = $filingStatus = "";
$taxOwed = 0.0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $income = $_POST["income"];
  $deductions = $_POST["deductions"];
  $filingStatus = $_POST["filing_status"];

  // Dummy tax calculation logic
  $taxableIncome = $income - $deductions;
  if ($filingStatus == "single") {
    $taxOwed = $taxableIncome * 0.22;
  } else {
    $taxOwed = $taxableIncome * 0.18;
  }

  // Insert record into database
  $stmt = $conn->prepare("INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ddsd", $income, $deductions, $filingStatus, $taxOwed);
  $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tax Calculator</title>
</head>
<body>

<h2>Tax Calculator</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Income: <input type="text" name="income">
  <br><br>
  Deductions: <input type="text" name="deductions">
  <br><br>
  Filing Status:
  <input type="radio" name="filing_status" value="single">Single
  <input type="radio" name="filing_status" value="married">Married
  <br><br>
  <input type="submit" name="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<h3>Tax Estimated: $".number_format($taxOwed, 2)."</h3>";
}
?>

</body>
</html>

<?php
$conn->close();
?>
