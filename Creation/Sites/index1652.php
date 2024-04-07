<?php

*
** This is a simple example of how you could approach creating and integrating
** a functionality for adding custom exercises to a health and wellness products website.
** This example includes both the frontend form and backend processing in PHP to store the exercise data in a MySQL database.
** Ensure you have a MySQL database configured as per the provided credentials and details.
** Note: This code lacks comprehensive error handling, validation, and security measures such as prepared statements for SQL injection prevention.
** It is simplified for educational purposes and should not be used as-is in a production environment.
*/

// Setting database connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for custom exercises if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
)";

if ($conn->query($tableCreationQuery) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $instructions = $_POST['instructions'];
    $video_url = $_POST['video_url'];

    $insertQuery = "INSERT INTO custom_exercises (name, instructions, video_url)
    VALUES ('$name', '$instructions', '$video_url')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "New exercise added successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Custom Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input[type=text], input[type=url], textarea {
            padding: 10px;
            margin-top: 5px;
        }
        input[type=submit] {
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a Custom Exercise</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Exercise Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="instructions">Instructions:</label>
            <textarea id="instructions" name="instructions" rows="4" required></textarea>

            <label for="video_url">Video URL (optional):</label>
            <input type="url" id="video_url" name="video_url">

            <input type="submit" value="Add Exercise">
        </form>
    </div>
</body>
</html>
