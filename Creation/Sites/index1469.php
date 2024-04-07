<?php
// Define MySQL connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create table if it does not exist
try {
    $query = "CREATE TABLE IF NOT EXISTS finance_goals (
        id INT AUTO_INCREMENT PRIMARY KEY,
        goal_name VARCHAR(255) NOT NULL,
        target_amount DECIMAL(10,2) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($query);
} catch (PDOException $e) {
    die("ERROR: Could not execute $query. " . $e->getMessage());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["goal_name"]) && isset($_POST["target_amount"])) {
    $goal_name = trim($_POST["goal_name"]);
    $target_amount = trim($_POST["target_amount"]);

    // Insert goal into database
    try {
        $query = "INSERT INTO finance_goals (goal_name, target_amount) VALUES (:goal_name, :target_amount)";
        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(":goal_name", $goal_name, PDO::PARAM_STR);
        $stmt->bindParam(":target_amount", $target_amount, PDO::PARAM_STR);

        // Execute the prepared statement
        $stmt->execute();
        echo "<script>alert('Finance goal added successfully!');</script>";
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $query. " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Your Finance Goals - Pet Supplies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e68c;
            color: #556b2f;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        form {
            background-color: #fff8dc;
            padding: 20px;
            border-radius: 8px;
            display: inline-block;
        }
        input, button {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #8fbc8f;
        }
        button {
            cursor: pointer;
            background-color: #6b8e23;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Personal Finance Goal</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Goal Name:</label><br>
            <input type="text" name="goal_name" required><br>
            <label>Target Amount ($):</label><br>
            <input type="number" name="target_amount" required><br>
            <button type="submit">Add Goal</button>
        </form>
    </div>
</body>
</html>
