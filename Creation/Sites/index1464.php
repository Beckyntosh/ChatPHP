<!DOCTYPE html>
<html>
<head>
    <title>Personal Finance Goal Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #555;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .goals {
            margin-top: 20px;
        }
        .goal {
            margin-bottom: 10px;
            padding: 10px;
            background: #e7e7e7;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Set Your Personal Finance Goal</h2>
    <form action="" method="POST">
        <label for="goalName">Goal Name:</label>
        <input type="text" id="goalName" name="goalName" placeholder="Example: Save $5000 for travel" required>
        <label for="goalAmount">Goal Amount ($):</label>
        <input type="number" id="goalAmount" name="goalAmount" required>
        <button type="submit" name="submit">Add Goal</button>
    </form>

    <div class="goals">
        <h2>Your Goals</h2>
Goals will be listed here
        <?php
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['submit'])) {
                $sql = $conn->prepare("INSERT INTO finance_goals (goal_name, goal_amount) VALUES (:goalName, :goalAmount)");
                $sql->bindParam(':goalName', $_POST['goalName']);
                $sql->bindParam(':goalAmount', $_POST['goalAmount']);
                $sql->execute();
                echo "<div class='goal'>New goal added successfully.</div>";
            }

            $stmt = $conn->prepare("SELECT goal_name, goal_amount FROM finance_goals");
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $k=>$v) {
                echo "<div class='goal'><strong>".$v['goal_name']."</strong>: $".number_format($v['goal_amount'], 2)."</div>";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </div>
</div>
</body>
</html>
<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $conn->exec($sql);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
