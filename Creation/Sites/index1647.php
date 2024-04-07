<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Custom Exercise - Kitchenware Fitness</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0f0f0;
            padding: 20px;
        }
        form, .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        input[type=text], textarea, input[type=file] {
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
    <div class="container">
        <h2>Add a Custom Exercise</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label for="exerciseName">Exercise Name:</label>
            <input type="text" id="exerciseName" name="exerciseName" required>
            
            <label for="instructions">Instructions:</label>
            <textarea id="instructions" name="instructions" required></textarea>
            
            <label for="video">Upload Video:</label>
            <input type="file" id="video" name="video" required>
            
            <input type="submit" name="submit" value="Add Exercise">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
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

        $exerciseName = mysqli_real_escape_string($conn, $_POST['exerciseName']);
        $instructions = mysqli_real_escape_string($conn, $_POST['instructions']);
        $videoName = mysqli_real_escape_string($conn, $_FILES['video']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["video"]["name"]);

        // Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS custom_exercises (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            exercise_name VARCHAR(50) NOT NULL,
            instructions TEXT NOT NULL,
            video VARCHAR(100) NOT NULL,
            reg_date TIMESTAMP
            )";

        if ($conn->query($sql) === TRUE) {
            // Attempt to upload file
            if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO custom_exercises (exercise_name, instructions, video)
                VALUES ('$exerciseName', '$instructions', '$videoName')";
                if ($conn->query($sql) === TRUE) {
                    echo "<p>New exercise added successfully.</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
