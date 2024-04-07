<?php
// Simplified example - not suitable for production without proper validation and security measures

// Database connection - assuming PDO
try {
    $pdo = new PDO("mysql:host=db;dbname=my_database", 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Check if table exists, if not create one
try {
    $pdo->query("SELECT 1 FROM tax_rates LIMIT 1");
} catch (Exception $e) {
    // Create table
    $pdo->exec("CREATE TABLE tax_rates (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filing_status VARCHAR(50),
        income_min DECIMAL,
        income_max DECIMAL,
        tax_rate DECIMAL
    ) ENGINE=InnoDB");

    // Insert sample tax rates
    $pdo->exec("INSERT INTO tax_rates (filing_status, income_min, income_max, tax_rate) VALUES
                ('single', 0, 9875, 10),
                ('single', 9876, 40125, 12),
                ('single', 40126, 85525, 22),
                ('single', 85526, 163300, 24),
                ('single', 163301, 207350, 32),
                ('single', 207351, 518400, 35),
                ('single', 518401, 1000000, 37),
                ('married', 0, 19750, 10),
                ('married', 19751, 80250, 12),
                ('married', 80251, 171050, 22),
                ('married', 171051, 326600, 24),
                ('married', 326601, 414700, 32),
                ('married', 414701, 622050, 35),
                ('married', 622051, 1000000, 37)");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $income = $_POST['income'] ?? 0;
    $deductions = $_POST['deductions'] ?? 0;
    $filingStatus = $_POST['filing_status'] ?? 'single';

    $income -= $deductions;

    $query = "SELECT * FROM tax_rates WHERE filing_status = ? AND income_min <= ? AND income_max >= ? ORDER BY income_min ASC";
    $statement = $pdo->prepare($query);
    $statement->execute([$filingStatus, $income, $income]);
    $taxRate = $statement->fetch();

    if ($taxRate) {
        $taxOwed = $income * ($taxRate['tax_rate'] / 100);
    } else {
        $taxOwed = "Income out of range";
    }
} else {
    $taxOwed = "Fill in and submit the form to see the result.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tax Calculator</title>
</head>
<body>
<h1>Tax Calculator</h1>
<form method="post">
    <label for="income">Income:</label>
    <input type="number" id="income" name="income" required><br>
    
    <label for="deductions">Deductions:</label>
    <input type="number" id="deductions" name="deductions"><br>
    
    <label for="filing_status">Filing Status:</label>
    <select id="filing_status" name="filing_status">
        <option value="single">Single</option>
        <option value="married">Married</option>
    </select><br>
    
    <input type="submit" value="Calculate Tax">
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <h2>Tax Owed: <?php echo is_numeric($taxOwed) ? '$' . number_format($taxOwed, 2) : $taxOwed; ?></h2>
<?php endif; ?>

</body>
</html>