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
$table_sql = "CREATE TABLE IF NOT EXISTS `conversion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient` varchar(50) NOT NULL,
  `from_unit` varchar(10) NOT NULL,
  `to_unit` varchar(10) NOT NULL,
  `conversion_factor` double NOT NULL,
  PRIMARY KEY (`id`)
)";

if (!$conn->query($table_sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Detect form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ingredient = $_POST['ingredient'];
  $amount = $_POST['amount'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];
  
  // Fetch conversion factor from database
  $sql = "SELECT conversion_factor FROM conversion WHERE ingredient='$ingredient' AND from_unit='$from_unit' AND to_unit='$to_unit'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $conversion_factor = $row["conversion_factor"];
      $converted_amount = $amount * $conversion_factor;
    }
  } else {
    echo "0 results";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Conversion Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #00ff41;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        input, select {
            padding: 10px;
            margin-top: 5px;
            background-color: #292929;
            color: #ffffff;
            border: 1px solid #00ff41;
        }
        button {
            padding: 10px 20px;
            background-color: #00ff41;
            color: #000000;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Recipe Conversion Calculator</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="ingredient">Ingredient:</label><br>
        <input type="text" id="ingredient" name="ingredient" required><br>
        <label for="amount">Amount:</label><br>
        <input type="number" id="amount" name="amount" step="0.01" required><br>
        <label for="from_unit">From Unit:</label><br>
        <select id="from_unit" name="from_unit" required>
            <option value="cups">Cups</option>
            <option value="grams">Grams</option>
Add more units as needed
        </select><br>
        <label for="to_unit">To Unit:</label><br>
        <select id="to_unit" name="to_unit" required>
            <option value="grams">Grams</option>
            <option value="cups">Cups</option>
Add more units as needed
        </select><br>
        <button type="submit">Convert</button>
    </form>
    <?php
    if (isset($converted_amount)) {
      echo "<h2>Converted Amount: " . number_format($converted_amount, 2) . " " . $to_unit . "</h2>";
    }
    ?>
</div>
</body>
</html>

<?php $conn->close(); ?>
