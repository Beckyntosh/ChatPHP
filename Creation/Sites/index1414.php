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

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(30) NOT NULL,
goal INT(6) NOT NULL,
user_id INT(6) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table habits created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habit_name = $_POST["habit_name"];
    $goal = $_POST["goal"];
    $user_id = 1; //assuming a user id for this example
    
    $sql = "INSERT INTO habits (habit_name, goal, user_id)
    VALUES ('$habit_name', '$goal', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0ebe3;
            color: #333;
            text-align: center;
        }
        .container {
            margin: auto;
            width: 50%;
            border: 5px solid #8b5f4d;
            padding: 10px;
            background-color: #fff;
            border-radius: 15px;
        }
        input[type=text], input[type=number] {
            width: 80%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 85%;
            background-color: #8b5f4d;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #6e4a35;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Habit Tracker Entry</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="habit_name">Habit Name:</label>
        <input type="text" id="habit_name" name="habit_name" placeholder="e.g., Drink water" required><br>
        
        <label for="goal">Daily Goal:</label>
        <input type="number" id="goal" name="goal" placeholder="e.g., 2 liters" required><br>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
