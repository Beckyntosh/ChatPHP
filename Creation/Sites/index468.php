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

// Check if table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'recipes_conversion'";
$result = $conn->query($tableCheckQuery);

if ($result->num_rows == 0) {
    $createTable = "CREATE TABLE recipes_conversion (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ingredient_name VARCHAR(255) NOT NULL,
    from_unit VARCHAR(50),
    to_unit VARCHAR(50),
    conversion_factor DECIMAL(10,5) NOT NULL
    )";

    if ($conn->query($createTable) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }
}

function convertIngredient($ingredient_name, $amount, $from_unit, $to_unit, $conn) {
    $stmt = $conn->prepare("SELECT conversion_factor FROM recipes_conversion WHERE ingredient_name = ? AND from_unit = ? AND to_unit = ?");
    $stmt->bind_param("sss", $ingredient_name, $from_unit, $to_unit);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return $amount * $row["conversion_factor"];
        }
    } else {
        return "Conversion not found.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingredient_name = $_POST["ingredient_name"];
    $amount = $_POST["amount"];
    $from_unit = $_POST["from_unit"];
    $to_unit = $_POST["to_unit"];
    $converted_amount = convertIngredient($ingredient_name, $amount, $from_unit, $to_unit, $conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Recipe Conversion Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4e9cd;
            color: #3f301d;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #d8c3a5;
            padding: 20px;
            border: 1px solid #3f301d;
            border-radius: 10px;
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
            background-color: #8b5c2c;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #7a5019;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Recipe Conversion Calculator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Ingredient Name:<br>
        <input type="text" name="ingredient_name" value="<?php echo isset($_POST['ingredient_name']) ? $_POST['ingredient_name'] : ''; ?>"><br>
        Amount:<br>
        <input type="text" name="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ''; ?>"><br>
        Convert From (e.g. cups):<br>
        <input type="text" name="from_unit" value="<?php echo isset($_POST['from_unit']) ? $_POST['from_unit'] : ''; ?>"><br>
        Convert To (e.g. grams):<br>
        <input type="text" name="to_unit" value="<?php echo isset($_POST['to_unit']) ? $_POST['to_unit'] : ''; ?>"><br>
        <input type="submit" value="Convert">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h4>Conversion Result:</h4>
        <p><?php echo htmlspecialchars($amount) . " " . htmlspecialchars($from_unit) . " of " . htmlspecialchars($ingredient_name) . " = " . htmlspecialchars($converted_amount) . " " . htmlspecialchars($to_unit); ?></p>
    <?php endif; ?>
</div>
</body>
</html>
<?php
$conn->close();
?>