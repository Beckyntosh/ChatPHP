<?php
// Database connection settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create table for habits if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS habits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    habitName VARCHAR(255) NOT NULL,
    goal INT NOT NULL,
    progress INT DEFAULT 0,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$pdo->exec($sql);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["habitName"], $_POST["goal"])) {
    $habitName = $_POST["habitName"];
    $goal = $_POST["goal"];

    // Insert new habit
    $sql = "INSERT INTO habits (habitName, goal) VALUES (:habitName, :goal)";
    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables
        $stmt->bindParam(":habitName", $paramHabitName, PDO::PARAM_STR);
        $stmt->bindParam(":goal", $paramGoal, PDO::PARAM_INT);
        
        // Set parameters
        $paramHabitName = $habitName;
        $paramGoal = $goal;
        
        if($stmt->execute()){
            echo "<script>alert('Habit added successfully!');</script>";
        } else {
            echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }

        // Close statement
        unset($stmt);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        form { margin: 20px auto; width: 300px; }
        input[type=text], input[type=number] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; display: inline-block; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>

<div class="bold">
    <h2>Create a Habit Tracker Entry</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="habitName">Habit Name:</label>
        <input type="text" id="habitName" name="habitName" required>
        
        <label for="goal">Daily Goal (e.g., 2000 ml of water):</label>
        <input type="number" id="goal" name="goal" required>
        
        <input type="submit" value="Add Habit">
    </form>
</div>

</body>
</html>
