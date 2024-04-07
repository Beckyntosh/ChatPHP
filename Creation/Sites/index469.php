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

$sql = "CREATE TABLE IF NOT EXISTS ChildSupport (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
income DECIMAL(10,2) NOT NULL,
children INT(3) NOT NULL,
custody VARCHAR(50),
estimated_support DECIMAL(10,2),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $income = $_POST['income'];
    $children = $_POST['children'];
    $custody = $_POST['custody'];

    $estimated_support = ($income / 100) * (20 + ($children - 1) * 5);
    if ($custody == 'Joint') {
        $estimated_support /= 2;
    }

    $stmt = $conn->prepare("INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("diss", $income, $children, $custody, $estimated_support);

    if ($stmt->execute()) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Child Support Estimator</title>
</head>
<body>
    <h2>Child Support Estimator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="income">Annual Income:</label><br>
        <input type="number" id="income" name="income" required><br>
        <label for="children">Number of Children:</label><br>
        <input type="number" id="children" name="children" required><br>
        <label for="custody">Custody Arrangement:</label><br>
        <select id="custody" name="custody">
            <option value="Sole">Sole</option>
            <option value="Joint">Joint</option>
        </select><br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>