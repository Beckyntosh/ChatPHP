<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data
    $exercise = $_POST['exercise'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    // Database connection variables
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

    // Exercise Table SQL
    $sql = "INSERT INTO exercises (exercise, duration, intensity) VALUES ('$exercise', '$duration', '$intensity')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Exercise</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        form {
            width: 100%;
            margin: 20px 0;
        }
        input[type="text"],
        input[type="number"],
        select {
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
            background-color: #555;
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
        <h2>Add Exercise to Log</h2>
        <form action="" method="post">
            <label for="exercise">Exercise</label>
            <input type="text" id="exercise" name="exercise" required>

            <label for="duration">Duration (minutes)</label>
            <input type="number" id="duration" name="duration" required>

            <label for="intensity">Intensity</label>
            <select id="intensity" name="intensity">
                <option value="low">Low</option>
                <option value="moderate">Moderate</option>
                <option value="high">High</option>
            </select>

            <input type="submit" value="Log Exercise">
        </form>
    </div>
</body>
</html>
