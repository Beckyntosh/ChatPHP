<?php
// Simple implementation of a pet profile creation in PHP with MySQL for a website. 
// This example does not include advanced security measures like input sanitization and should be enhanced for production use.

// MySQL connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create pet profile table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS PetProfiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    healthInfo TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $petName = $conn->real_escape_string($_POST["petName"]);
    $healthInfo = $conn->real_escape_string($_POST["healthInfo"]);

    // Insert into database
    $sql = "INSERT INTO PetProfiles (petName, healthInfo) VALUES ('$petName', '$healthInfo')";

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
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: 'Ada Lovelace', sans-serif;
            background-color: #f0eae0;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            cursor: pointer;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Pet Profile</h2>
        <form method="POST">
            <label for="petName">Pet Name:</label>
            <input type="text" id="petName" name="petName" required>

            <label for="healthInfo">Health Information:</label>
            <textarea id="healthInfo" name="healthInfo" rows="4" required></textarea>

            <input type="submit" value="Create Profile">
        </form>
    </div>
</body>
</html>
