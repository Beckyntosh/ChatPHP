// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: School Supplies Style: Ada Lovelace
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

// Check if the calculations table exists, create if not
$table_check_query = "SHOW TABLES LIKE 'calculations'";
$table_exists = $conn->query($table_check_query);
if($table_exists->num_rows == 0){
    $create_table_query = "CREATE TABLE calculations (
                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            loan_amount DECIMAL(10, 2) NOT NULL,
                            interest_rate DECIMAL(4, 2) NOT NULL,
                            term_years INT(3) NOT NULL,
                            monthly_payment DECIMAL(10, 2) NOT NULL,
                            calc_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                            )";
    if(!$conn->query($create_table_query)){
        die("Error creating table: " . $conn->error);
    }
}

$monthlyPayment = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = $_POST['loanAmount'];
    $interestRate = $_POST['interestRate'];
    $termYears = $_POST['termYears'];
    
    $n = $termYears * 12;
    $r = $interestRate / 1200;
    
    $monthlyPayment = $loanAmount * $r * pow((1+$r), $n) / (pow((1+$r), $n) - 1);
    
    // Insert into database
    $insert_query = $conn->prepare("INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (?, ?, ?, ?)");
    $insert_query->bind_param("ddid", $loanAmount, $interestRate, $termYears, $monthlyPayment);
    
    if(!$insert_query->execute()){
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mortgage Repayment Calculator</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0f8ff; /* Alice blue background */
        }
        .calculator {
            width: 300px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
        }
        input[type=text], input[type=number] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="calculator">
<h2>Mortgage Repayment Calculator</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <label for="loanAmount">Loan Amount</label>
  <input type="number" id="loanAmount" name="loanAmount" required>
  
  <label for="interestRate">Interest Rate (%)</label>
  <input type="text" id="interestRate" name="interestRate" required>
  
  <label for="termYears">Term (Years)</label>
  <input type="number" id="termYears" name="termYears" required>
  
  <button type="submit">Calculate</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h4>Monthly Payment: $" . number_format($monthlyPayment, 2) . "</h4>";
}
?>
</div>

</body>
</html>
