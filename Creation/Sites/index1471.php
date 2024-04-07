<?php
// Note: The provided code is for educational purposes and might need adjustments for a production environment.

// Database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['goal']) && !empty($_POST['amount'])){
    
    // Prepare an insert statement
    $sql = "INSERT INTO finance_goals (goal, amount) VALUES (:goal, :amount)";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':goal', $param_goal, PDO::PARAM_STR);
        $stmt->bindParam(':amount', $param_amount, PDO::PARAM_STR);
        
        // Set parameters
        $param_goal = trim($_POST['goal']);
        $param_amount = trim($_POST['amount']);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Redirect to same page to show the updated list
            header("location: ".$_SERVER['PHP_SELF']);
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
}

// Try to fetch existing goals
try{
    $existingGoals = $pdo->query("SELECT * FROM finance_goals")->fetchAll();
} catch(PDOException $e){
    echo "Error fetching records: " . $e->getMessage();
}

// Close connection
unset($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Personal Finance Goals</title>
<style>
    body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
</style>
</head>
<body>
    <div class="wrapper">
        <h2>Add a Finance Goal</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Goal</label>
                <input type="text" name="goal" required>
            </div>    
            <div>
                <label>Amount ($)</label>
                <input type="text" name="amount" required>
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
        <h2>My Goals</h2>
        <?php if(!empty($existingGoals)): ?>
            <ul>
            <?php foreach($existingGoals as $goal): ?>
                <li><?= htmlspecialchars($goal['goal']) ?> - $<?= htmlspecialchars($goal['amount']) ?></li>
            <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No goals yet. Add your first goal!</p>
        <?php endif; ?>
    </div>    
</body>
</html>

-- Run this SQL script to create the necessary table for this application

CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE IF NOT EXISTS finance_goals (
  id INT AUTO_INCREMENT PRIMARY KEY,
  goal VARCHAR(255) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
