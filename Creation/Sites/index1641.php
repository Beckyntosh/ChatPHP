<?php
// Simple connection script
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

// Create exercise table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS CustomExercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exerciseName VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    videoURL VARCHAR(255),
    reg_date TIMESTAMP
)";
if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exerciseName = $_POST['exerciseName'];
    $instructions = $_POST['instructions'];
    $videoURL = $_POST['videoURL'];

    $stmt = $conn->prepare("INSERT INTO CustomExercises (exerciseName, instructions, videoURL) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $exerciseName, $instructions, $videoURL);

    if ($stmt->execute()) {
        echo "<p>Exercise added successfully!</p>";
    } else {
        echo "<p>Failed to add exercise: " . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Custom Exercise</title>
    <style>
        /* Imaginative style code */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        input[type=text], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .imaginary-corner {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            font-size: 24px;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="imaginary-corner">Imaginative Exercise Adder</div>
    <form action="" method="post">
        <label for="exerciseName">Exercise Name:</label>
        <input type="text" id="exerciseName" name="exerciseName" required>

        <label for="instructions">Instructions:</label>
        <textarea id="instructions" name="instructions" required></textarea>

        <label for="videoURL">Video URL (optional):</label>
        <input type="text" id="videoURL" name="videoURL">

        <input type="submit" value="Add Exercise">
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
