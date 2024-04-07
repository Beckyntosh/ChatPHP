<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mortgage Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 600px; margin: auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type=text], input[type=number] { width: 100%; padding: 8px; margin: 4px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mortgage Payment Calculator</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="form-group">
                <label for="loanAmount">Loan Amount ($):</label>
                <input type="number" id="loanAmount" name="loanAmount" required>
            </div>
            <div class="form-group">
                <label for="interestRate">Interest Rate (%):</label>
                <input type="text" id="interestRate" name="interestRate" required>
            </div>
            <div class="form-group">
                <label for="loanTerm">Loan Term (Years):</label>
                <input type="number" id="loanTerm" name="loanTerm" required>
            </div>
            <input type="submit" value="Calculate">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $loanAmount = $_POST['loanAmount'];
            $interestRate = $_POST['interestRate'];
            $loanTerm = $_POST['loanTerm'];
            
            $monthlyInterestRate = ($interestRate / 100) / 12;
            $numberOfPayments  = $loanTerm * 12;
            
            $part1 = pow((1 + $monthlyInterestRate), $numberOfPayments);
            $monthlyPayment = ($loanAmount * $monthlyInterestRate * $part1) / ($part1 - 1);
            
            echo "<h4>Monthly Payment: $" . number_format($monthlyPayment, 2) . "</h4>";
        }
        ?>
    </div>
    
MySQL Section
    <?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $database = "my_database";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Create table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS MortgageCalculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    loanAmount DECIMAL(10,2),
    interestRate DECIMAL(5,2),
    loanTerm INT,
    monthlyPayment DECIMAL(10,2),
    calculationTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if (!$conn->query($sql) === TRUE) {
        echo "Error creating table: " . $conn->error;
    }
    
    // Insert calculation results into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stmt = $conn->prepare("INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ddid", $loanAmount, $interestRate, $loanTerm, $monthlyPayment);
        $stmt->execute();
        $stmt->close();
    }
    
    $conn->close();
    ?>
</body>
</html>