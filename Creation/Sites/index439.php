<!DOCTYPE html>
<html>
<head>
    <title>Investment Return Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="number"], select, button {
            padding: 10px;
            margin-top: 10px;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Investment Return Calculator</h2>
        <form method="post">
            <input type="number" name="initialInvestment" placeholder="Initial Investment (e.g., 10000)" required><br>
            <input type="number" step="0.01" name="annualReturn" placeholder="Annual Return Rate (e.g., 5)" required><br>
            <input type="number" name="years" placeholder="Number of Years (e.g., 20)" required><br>
            <button type="submit" name="calculate">Calculate Future Value</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['calculate'])) {
            $initialInvestment = $_POST['initialInvestment'];
            $annualReturn = $_POST['annualReturn'];
            $years = $_POST['years'];

            $futureValue = $initialInvestment * pow((1 + $annualReturn / 100), $years);

            echo "<p>Future Value: $" . number_format($futureValue, 2) . "</p>";
        }

        // Database connection
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create table if not exists
            $sql = "CREATE TABLE IF NOT EXISTS InvestmentCalculations (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                initialInvestment DECIMAL(10,2) NOT NULL,
                annualReturn DECIMAL(5,2) NOT NULL,
                years INT NOT NULL,
                futureValue DECIMAL(10,2) NOT NULL,
                calcDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

            $conn->exec($sql);

            // Insert data
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['calculate'])) {
                $stmt = $conn->prepare("INSERT INTO InvestmentCalculations (initialInvestment, annualReturn, years, futureValue) VALUES (:initialInvestment, :annualReturn, :years, :futureValue)");
                $stmt->bindParam(':initialInvestment', $initialInvestment);
                $stmt->bindParam(':annualReturn', $annualReturn);
                $stmt->bindParam(':years', $years);
                $stmt->bindParam(':futureValue', $futureValue);
                $stmt->execute();
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>