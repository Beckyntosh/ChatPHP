<?php
$error = "";
$calories = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $activity = $_POST["activity"];

    if (!empty($age) && !empty($gender) && !empty($weight) && !empty($height) && !empty($activity)) {
        $bmr = ($gender == "male") ? (88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age)) : (447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age));
        switch ($activity) {
            case 'sedentary':
                $calories = $bmr * 1.2;
                break;
            case 'lightly':
                $calories = $bmr * 1.375;
                break;
            case 'moderately':
                $calories = $bmr * 1.55;
                break;
            case 'very':
                $calories = $bmr * 1.725;
                break;
            case 'extra':
                $calories = $bmr * 1.9;
                break;
        }
    } else {
        $error = "All fields are required!";
    }
}

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

$sql = "CREATE TABLE IF NOT EXISTS CalorieIntake (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
age INT(3) NOT NULL,
gender VARCHAR(10) NOT NULL,
weight FLOAT NOT NULL,
height FLOAT NOT NULL,
activity VARCHAR(20) NOT NULL,
calories FLOAT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table CalorieIntake created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if (!empty($calories)) {
    $stmt = $conn->prepare("INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isiiss", $age, $gender, $weight, $height, $activity, $calories);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calorie Intake Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        .container {
            width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Calorie Intake Calculator</h2>
    <p><?= $error ? $error : "" ?></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Age: <input type="number" name="age" required><br>
        Gender: 
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>
        Weight (kg): <input type="number" name="weight" step="0.01" required><br>
        Height (cm): <input type="number" name="height" step="0.01" required><br>
        Activity Level: 
        <select name="activity" required>
            <option value="sedentary">Sedentary (little or no exercise)</option>
            <option value="lightly">Lightly active (light exercise/sports 1-3 days/week)</option>
            <option value="moderately">Moderately active (moderate exercise/sports 3-5 days/week)</option>
            <option value="very">Very active (hard exercise/sports 6-7 days a week)</option>
            <option value="extra">Extra active (very hard exercise/sports & physical job or 2x training)</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($calories) {
        echo "<p>To maintain your weight, you need <b>" . number_format($calories) . " calories</b> per day.</p>";
    }
    ?>
</div>
</body>
</html>