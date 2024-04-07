<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Workout Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #A8DADC;
            color: #1D3557;
            text-align: center;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #F1FAEE;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        input, select, button {
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Exercise to Your Digital Workout Log</h2>
        <form method="post">
            <input type="text" name="exercise" placeholder="Exercise Name" required><br>
            <input type="number" name="duration" placeholder="Duration in minutes" required><br>
            <select name="intensity" required>
                <option value="">Select Intensity</option>
                <option value="low">Low</option>
                <option value="moderate">Moderate</option>
                <option value="high">High</option>
            </select><br>
            <button type="submit" name="addExercise">Add Exercise</button>
        </form>
    </div>

    <?php
    if (isset($_POST['addExercise'])) {
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO exercises (exercise_name, duration, intensity) VALUES (:exercise_name, :duration, :intensity)");
            $stmt->bindParam(':exercise_name', $exercise_name);
            $stmt->bindParam(':duration', $duration);
            $stmt->bindParam(':intensity', $intensity);

            $exercise_name = $_POST['exercise'];
            $duration = $_POST['duration'];
            $intensity = $_POST['intensity'];

            $stmt->execute();

            echo "<div style='text-align:center;'>Exercise Added Successfully!</div>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>

**Note:** Before running the PHP code, ensure that you've created a MySQL database named `my_database` and a table within that database. The table creation SQL command would look like this:

CREATE TABLE exercises (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity VARCHAR(50) NOT NULL,
    recorded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Also, ensure your server has PHP and MySQL installed and configured correctly to connect to your database with the credentials provided in the PHP script.