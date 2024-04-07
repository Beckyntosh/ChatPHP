

<?php
// db.php - Simple database connection script
$servername = "db";
$username = "root";
$password = ""; // You should use environment variables or secure methods to handle passwords
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// finance_goals.php - Main file
$message = '';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $goal_name = $_POST['goal_name'];
    $goal_amount = $_POST['goal_amount'];

    // SQL to create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Table creation success or already exists
        // Insert new goal
        $stmt = $conn->prepare("INSERT INTO finance_goals (goal_name, goal_amount) VALUES (?, ?)");
        $stmt->bind_param("ss", $goal_name, $goal_amount);

        if($stmt->execute()){
            $message = "New finance goal created successfully";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();

    } else {
        $message = "Error creating table: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a Personal Finance Goal</title>
</head>
<body style="background-color:lightyellow;">
    <h2>Create Your Personal Finance Goal</h2>

    <form method="POST">
        <label for="goal_name">Goal Name:</label>
        <input type="text" id="goal_name" name="goal_name" required><br><br>
        <label for="goal_amount">Goal Amount ($):</label>
        <input type="number" id="goal_amount" name="goal_amount" required><br><br>
        <button type="submit">Submit</button>
    </form>

    <?php if($message !== ''): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>

Remember, you must modify the database connection settings according to your environment, especially not including sensitive information directly in your code files.

**Important:**
1. Never use root or highly privileged users for application database access. Create specific, limited privilege users for your applications.
2. Always validate and sanitize user inputs to protect against SQL injection and other common web application vulnerabilities.
3. Use secure practices for handling passwords and sensitive information, such as using environment variables.