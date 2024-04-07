
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

// Create table
$createTable = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $instructions = $_POST['instructions'];
  $video_url = $_POST['video_url'];

  $stmt = $conn->prepare("INSERT INTO custom_exercises (name, instructions, video_url) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $instructions, $video_url);
  
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Custom Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        input[type=text], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
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
        <h2>Add Custom Exercise</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Exercise Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="instructions">Instructions:</label>
            <textarea id="instructions" name="instructions" required></textarea>

            <label for="video_url">Video URL:</label>
            <input type="text" id="video_url" name="video_url">
        
            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>

This example creates a form for adding custom exercises, integrates with a MySQL database to store the data, and uses basic front-end styling for the ultraprecise style aesthetic mentioned. Please note, for real-world applications, security considerations like sanitizing input data, using secure connections, and protecting sensitive information must be strictly implemented.