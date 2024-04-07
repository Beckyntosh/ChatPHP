<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Running Pace Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e6f6;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px 0 rgba(0,0,0,0.1);
            display: inline-block;
            margin: 10px;
            padding: 20px;
            width: auto;
        }
        input, button {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
        }
        .result {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Running Pace Calculator</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <input type="text" name="distance" placeholder="Distance in km (e.g., 21.1 for half marathon)"/>
            <input type="text" name="time" placeholder="Time in format hh:mm:ss (e.g., 02:00:00)"/>
            <button type="submit" name="calculate">Calculate Pace</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate'])) {
            $distance = $_POST['distance'];
            $time = $_POST['time'];

            if (!empty($distance) && !empty($time)) {
                list($hours, $minutes, $seconds) = explode(':', $time);
                $totalTimeInMinutes = ($hours * 60) + $minutes + ($seconds / 60);
                $pace = $totalTimeInMinutes / $distance;
                $paceMinutes = floor($pace);
                $paceSeconds = round(($pace - $paceMinutes) * 60);

                echo "<div class='result'>Your pace: " . sprintf('%02d', $paceMinutes) . ":" . sprintf('%02d', $paceSeconds) . " per km</div>";
            } else {
                echo "<div class='result'>Please enter both distance and time.</div>";
            }
        }
        ?>
    </div>

    <?php
    // MySQL connection
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check or create table
        $checkTableQuery = "CREATE TABLE IF NOT EXISTS running_logs (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            distance DOUBLE NOT NULL,
            time TIME NOT NULL,
            pace VARCHAR(50) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

        $conn->exec($checkTableQuery);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate'])) {
            if(!empty($distance) && !empty($time) && isset($paceMinutes) && isset($paceSeconds)) {
                $paceStr = sprintf('%02d', $paceMinutes) . ":" . sprintf('%02d', $paceSeconds);
                $insertQuery = $conn->prepare("INSERT INTO running_logs (distance, time, pace) VALUES (?, ?, ?)");
                $insertQuery->execute([$distance, $time, $paceStr]);

                echo "<div class='result'>Pace saved to database successfully!</div>";
            }
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</body>
</html>