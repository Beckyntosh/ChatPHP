<?php
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

// Prepare table with conversion rates if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS conversion_rates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ingredient VARCHAR(50) NOT NULL,
    unit_from VARCHAR(10) NOT NULL,
    unit_to VARCHAR(10) NOT NULL,
    conversion_rate DECIMAL(10, 5) NOT NULL,
    reg_date TIMESTAMP
)";
if(!$conn->query($createTableSql)) {
  die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingredient = $_POST['ingredient'];
    $amount = $_POST['amount'];
    $unit_from = $_POST['unit_from'];
    $unit_to = $_POST['unit_to'];

    $conversion_sql = "SELECT conversion_rate FROM conversion_rates WHERE ingredient = '$ingredient' AND unit_from = '$unit_from' AND unit_to = '$unit_to'";
    $result = $conn->query($conversion_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $conversion_rate = $row['conversion_rate'];
        $converted_amount = $amount * $conversion_rate;
        echo "<div>Converted Amount: " . $converted_amount . " " . $unit_to . "</div>";
    } else {
        echo "<div>Conversion rate not found for the selected ingredient and units.</div>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recipe Conversion Calculator</title>
</head>
<body>
    <h2>Convert Recipe Ingredients</h2>
    <form method="post">
        <label for="ingredient">Ingredient:</label><br>
        <input type="text" id="ingredient" name="ingredient"><br>
        <label for="amount">Amount:</label><br>
        <input type="number" id="amount" name="amount" step="0.01"><br>
        <label for="unit_from">Unit From:</label><br>
        <input type="text" id="unit_from" name="unit_from"><br>
        <label for="unit_to">Unit To:</label><br>
        <input type="text" id="unit_to" name="unit_to"><br><br>
        <input type="submit" value="Convert">
    </form>
</body>
</html>