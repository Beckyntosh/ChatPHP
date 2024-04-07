<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Running Pace Calculator</title>
</head>
<body>
    <h2>Running Pace Calculator</h2>
    <form method="post">
        <input type="number" step="any" name="distance" placeholder="Distance in kilometers" required>
        <input type="text" name="time" placeholder="Time (HH:MM:SS)" required>
        <input type="submit" name="calculate" value="Calculate Pace">
    </form>

    <?php
    if(isset($_POST['calculate'])) {
        $distance = $_POST['distance'];
        list($hours, $minutes, $seconds) = explode(':', $_POST['time']);
        $totalTime = $hours * 3600 + $minutes * 60 + $seconds;
        $paceInSeconds = $totalTime / $distance;
        $paceMinutes = floor($paceInSeconds / 60);
        $paceSeconds = $paceInSeconds % 60;

        // Database connection
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
        
        $sql = "INSERT INTO running_pace_calculations (distance, time, pace) VALUES ('$distance', '{$_POST['time']}', '$paceMinutes:$paceSeconds')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>New record created successfully.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();

        echo "<p>For a distance of $distance km, your pace needs to be $paceMinutes minutes and $paceSeconds seconds per kilometer.</p>";
    }
    ?>
</body>
</html>