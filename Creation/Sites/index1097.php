<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregnancy Due Date Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e6f6;
            color: #333;
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #fff;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input[type="date"], button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pregnancy Due Date Calculator</h1>
        <form method="POST">
            <label for="lastPeriod">First day of last menstrual period:</label>
            <input type="date" id="lastPeriod" name="lastPeriod" required>
            <button type="submit" name="calculate">Calculate Due Date</button>
        </form>
        <?php
        if (isset($_POST['calculate'])) {
            $lastPeriod = $_POST['lastPeriod'];
            $dueDate = date('Y-m-d', strtotime("$lastPeriod +280 days"));

            echo "<p>Your estimated due date is: <strong>$dueDate</strong>. Please consult with your healthcare provider for more accurate information.</p>";
        }
        ?>
    </div>
</body>
</html>

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

$sql = "CREATE TABLE IF NOT EXISTS DueDates (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
lastPeriod DATE NOT NULL,
dueDate DATE NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  if(isset($lastPeriod) && isset($dueDate)) {
       $insertSQL = "INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('$lastPeriod', '$dueDate')";
       $conn->query($insertSQL);
  }
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
