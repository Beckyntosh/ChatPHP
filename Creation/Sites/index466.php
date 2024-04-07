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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS ingredient_conversion (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ingredient_name VARCHAR(30) NOT NULL,
    from_unit VARCHAR(20) NOT NULL,
    to_unit VARCHAR(20) NOT NULL,
    conversion_factor DECIMAL(10,4) NOT NULL
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recipe Conversion Calculator</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; background-color: beige; }
        form { margin: 20px; padding: 20px; background-color: #f4f4f4; border-radius: 10px;}
        input, select, button { padding: 10px; margin: 10px;}
    </style>
</head>
<body>
    <h1>Recipe Conversion Calculator</h1>
    <form action="" method="post">
        <label for="ingredient">Ingredient:</label>
        <input type="text" id="ingredient" name="ingredient" required>
        <label for="amount">Amount:</label>
        <input type="number" step="any" id="amount" name="amount" required>
        <label for="from_unit">From Unit:</label>
        <select id="from_unit" name="from_unit" required>
            <option value="cup">Cup</option>
            <option value="tablespoon">Tablespoon</option>
            <option value="teaspoon">Teaspoon</option>
        </select>
        <label for="to_unit">To Unit:</label>
        <select id="to_unit" name="to_unit" required>
            <option value="gram">Gram</option>
            <option value="kilogram">Kilogram</option>
            <option value="milliliter">Milliliter</option>
        </select>
        <button type="submit" name="convert">Convert</button>
    </form>
    
    <?php
    if (isset($_POST['convert'])) {
        $ingredient = $_POST['ingredient'];
        $amount = $_POST['amount'];
        $from_unit = $_POST['from_unit'];
        $to_unit = $_POST['to_unit'];
        
        $sql = "SELECT conversion_factor FROM ingredient_conversion WHERE ingredient_name='$ingredient' AND from_unit='$from_unit' AND to_unit='$to_unit'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $converted_amount = $amount * $row['conversion_factor'];
                echo "<p>$amount $from_unit of $ingredient is $converted_amount $to_unit.</p>";
            }
        } else {
            echo "<p>Conversion not found.</p>";
        }
    }
    ?>
</body>
</html>