<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace 'root' below with the actual password for the MySQL root or appropriate user as needed
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', 'root');
    define('MYSQL_HOST', 'db');
    define('MYSQL_DATABASE', 'my_database');

    // Attempt to connect to the database
    $mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

    // Check the connection
    if ($mysqli === false) {
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    // Escape user inputs for security
    $habit = $mysqli->real_escape_string($_REQUEST['habit']);
    $target = $mysqli->real_escape_string($_REQUEST['target']);
    $date = date('Y-m-d');
    
    // Check if habit already exists for today
    $checkSql = "SELECT id FROM habits WHERE habit='$habit' AND date='$date'";
    $checkResult = $mysqli->query($checkSql);

    if ($checkResult->num_rows == 0) {
        // Prepare an insert statement
        $sql = "INSERT INTO habits (habit, target, date) VALUES ('$habit', '$target', '$date')";

        if ($mysqli->query($sql) === true) {
            echo "<script>alert('Habit entry added successfully.');</script>";
        } else {
            echo "<script>alert('ERROR: Could not able to execute $sql. " . $mysqli->error . "');</script>";
        }
    } else {
        echo "<script>alert('This habit has already been added today.');</script>";
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Daily Habit</title>
    <style>
        body{ font: 14px sans-serif; text-align: center; }
        form{ margin-top: 20px; }
        input[type="text"], input[type="number"] { margin: 10px 0; }
    </style>
</head>
<body>

    <h2>Add Habit for Today</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Habit</label>
            <input type="text" name="habit" required>
        </div>
        <div>
            <label>Target (in liters)</label>
            <input type="number" name="target" step="0.01" required>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>

</body>
</html>

<?php
// Create table if not exists
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS habits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    habit VARCHAR(255) NOT NULL,
    target DECIMAL(10,2) NOT NULL,
    date DATE NOT NULL,
    UNIQUE KEY unique_habit_date (habit, date)
)";

if ($mysqli->query($sql) === true) {
    // Table created successfully
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

$mysqli->close();
?>
