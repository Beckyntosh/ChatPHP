<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mortgage Calculator - Ada Lovelace Style</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f2f2f2;
            color: #333;
        }
        .calculator {
            width: 300px;
            padding: 20px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="number"], input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 3px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Mortgage Repayment Calculator</h2>
        <form action="" method="POST">
            <input type="number" name="loan_amount" placeholder="Loan Amount ($)" required>
            <input type="number" name="interest_rate" step="0.01" placeholder="Interest Rate (%)" required>
            <input type="number" name="loan_term" placeholder="Loan Term (years)" required>
            <input type="submit" value="Calculate">
        </form>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $loan_amount = $_POST['loan_amount'];
            $interest_rate = $_POST['interest_rate'] / 100 / 12;
            $loan_term = $_POST['loan_term'] * 12;

            $top = pow((1 + $interest_rate), $loan_term);
            $bottom = $top - 1;
            $monthly = ($loan_amount * $interest_rate * $top) / ($bottom);

            echo "<div class='result'>";
            echo "Monthly Payment: $" . number_format($monthly, 2);
            echo "</div>";

            //Database connection and entry
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
            $sql = "CREATE TABLE IF NOT EXISTS MortgageCalculations (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                loan_amount DECIMAL(10, 2) NOT NULL,
                interest_rate DECIMAL(4, 2) NOT NULL,
                loan_term INT(6) NOT NULL,
                monthly_payment DECIMAL(10, 2) NOT NULL,
                calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

            if (!$conn->query($sql) === TRUE) {
                echo "Error creating table: " . $conn->error;
            }

            // Insert calculation into table
            $stmt = $conn->prepare("INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ddid", $loan_amount, $_POST['interest_rate'], $_POST['loan_term'], $monthly);

            if (!$stmt->execute()) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
