// PARAMETERS: Function: Mortgage Repayment Calculator: "Calculate monthly mortgage payments based on loan amount, interest rate, and term. Example: User calculates their mortgage payment for a $300,000 loan at 4% interest over 30 years Product: Bath Products Style: brave
<?php
// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
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

    // Collect POST data
    $loanAmount = $_POST['loanAmount'];
    $interestRate = $_POST['interestRate'];
    $loanTerm = $_POST['loanTerm'];

    // Calculate monthly payment
    $monthlyRate = $interestRate / 1200;
    $termInMonths = $loanTerm * 12;
    $monthlyPayment = $loanAmount * $monthlyRate / (1 - (pow(1/(1 + $monthlyRate), $termInMonths)));

    // Insert into database (if necessary)
    // Assuming you want to store the calculation made by user for any reason
    $stmt = $conn->prepare("INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("dddi", $loanAmount, $interestRate, $loanTerm, $monthlyPayment);

    if (!$stmt->execute()) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $stmt->close();
    $conn->close();

    echo "Monthly Mortgage Payment: $" . round($monthlyPayment, 2);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mortgage Calculator</title>
    <style>
        /* Simple CSS for brave style */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; }
        .container { width: 80%; margin: 0 auto; padding: 20px; }
        h1 { color: #444; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; }
        .form-group input { padding: 10px; width: 100%; }
        .submit-btn { padding: 10px 20px; background-color: #008cba; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mortgage Repayment Calculator</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="loanAmount">Loan Amount ($)</label>
                <input type="number" id="loanAmount" name="loanAmount" required>
            </div>
            <div class="form-group">
                <label for="interestRate">Interest Rate (%)</label>
                <input type="number" step="0.01" id="interestRate" name="interestRate" required>
            </div>
            <div class="form-group">
                <label for="loanTerm">Loan Term (Years)</label>
                <input type="number" id="loanTerm" name="loanTerm" required>
            </div>
            <button type="submit" class="submit-btn">Calculate</button>
        </form>
    </div>
</body>
</html>
