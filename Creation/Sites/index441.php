<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Investment Return Calculator</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f1f1f1;
            color: #333;
            padding: 20px;
        }
        .container {
            width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Investment Return Calculator</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="initialInvestment">Initial Investment ($):</label>
        <input type="text" id="initialInvestment" name="initialInvestment" required>

        <label for="annualReturn">Annual Return Rate (%):</label>
        <input type="text" id="annualReturn" name="annualReturn" required>

        <label for="years">Number of Years:</label>
        <input type="text" id="years" name="years" required>

        <input type="submit" name="calculate" value="Calculate">
    </form>
    <?php
    if (isset($_POST['calculate'])) {
        $initialInvestment = $_POST['initialInvestment'];
        $annualReturn = $_POST['annualReturn'];
        $years = $_POST['years'];

        // Future Value Calculation
        $futureValue = $initialInvestment * pow((1 + $annualReturn / 100), $years);

        echo "<h3>Future Value: $" . number_format($futureValue, 2) . "</h3>";
    }
    ?>
</div>

</body>
</html>
