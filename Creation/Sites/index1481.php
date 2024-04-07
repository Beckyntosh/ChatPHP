<?php
// Handling the connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Goals Table if not exists
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(50) NOT NULL,
    goal_amount DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert New Goal from POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['goal_name']) && !empty($_POST['goal_amount'])) {
    $goal_name = $_POST['goal_name'];
    $goal_amount = $_POST['goal_amount'];

    $stmt = $conn->prepare("INSERT INTO finance_goals (goal_name, goal_amount) VALUES (?, ?)");
    $stmt->bind_param("ss", $goal_name, $goal_amount);

    if($stmt->execute()){
        echo "<div>Goal added successfully.</div>";
    } else {
        echo "<div>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $stmt->close();
}

// Retrieve goals
$sql = "SELECT id, goal_name, goal_amount, reg_date FROM finance_goals";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Finance Goals</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Finance Goal</h2>
    <form method="POST">
        <label for="goal_name">Goal Name:</label><br>
        <input type="text" id="goal_name" name="goal_name" required><br>
        <label for="goal_amount">Goal Amount ($):</label><br>
        <input type="number" id="goal_amount" name="goal_amount" step="0.01" required><br><br>
        <input type="submit" value="Add Goal">
    </form>

    <h2>Current Finance Goals</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Goal Name</th>
            <th>Goal Amount</th>
            <th>Date Set</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["goal_name"]. "</td>
                        <td>$" . $row["goal_amount"]. "</td>
                        <td>" . $row["reg_date"]. "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</div>

</body>
</html>
