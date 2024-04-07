<?php
// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Connect to the database
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
    
    // Insert new custom exercise
    $exerciseName = mysqli_real_escape_string($conn, $_POST['exerciseName']);
    $instructions = mysqli_real_escape_string($conn, $_POST['instructions']);
    $videoLink = mysqli_real_escape_string($conn, $_POST['videoLink']);

    $sql = "INSERT INTO CustomExercises (exerciseName, instructions, videoLink)
    VALUES ('$exerciseName', '$instructions', '$videoLink')";

    if ($conn->query($sql) === TRUE) {
        echo "New exercise added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Custom Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input[type=text], input[type=url] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
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
    </style>
</head>
<body>
    <h2>Add Custom Exercise</h2>
    <form action="" method="post">
        <label for="exerciseName">Exercise Name:</label>
        <input type="text" id="exerciseName" name="exerciseName" placeholder="Exercise Name..." required>

        <label for="instructions">Instructions:</label>
        <input type="text" id="instructions" name="instructions" placeholder="Instructions..." required>

        <label for="videoLink">Video Link:</label>
        <input type="url" id="videoLink" name="videoLink" placeholder="https://example.com" pattern="https://.*" required>

        <input type="submit" name="submit" value="Add Exercise">
    </form>
</body>
</html>

<?php
// MySQL table creation script for reference, only run this once to set up the table.
*
CREATE TABLE IF NOT EXISTS CustomExercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exerciseName VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    videoLink VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
*/
?>
