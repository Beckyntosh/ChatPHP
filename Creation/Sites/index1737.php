<?php
// Assuming a single-file approach as requested, without any separation of concerns (Not recommended for production)

// Database configuration
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

// Database table creation, if not exists
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
health_info TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $health_info = $_POST['health_info'];

    // Inserting data into table
    $sql = "INSERT INTO pet_profiles (pet_name, health_info)
    VALUES ('$pet_name', '$health_info')";

    if ($conn->query($sql) === TRUE) {
      echo "New pet profile created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 24px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type=text], textarea {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type=submit] {
            cursor: pointer;
            padding: 10px 20px;
            background-color: dodgerblue;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type=submit]:hover {
            background-color: deepskyblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Pet Profile</h1>
        <form action="" method="post">
            <label for="pet_name">Pet Name:</label>
            <input type="text" id="pet_name" name="pet_name" required>

            <label for="health_info">Health Info:</label>
            <textarea id="health_info" name="health_info" rows="4" required></textarea>

            <input type="submit" value="Create Profile">
        </form>
    </div>
</body>
</html>
