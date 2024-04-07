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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Pets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    petType VARCHAR(30) NOT NULL,
    petBreed VARCHAR(50),
    petAge INT,
    healthInfo TEXT,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $petBreed = $_POST['petBreed'];
    $petAge = $_POST['petAge'];
    $healthInfo = $_POST['healthInfo'];

    $stmt = $conn->prepare("INSERT INTO Pets (petName, petType, petBreed, petAge, healthInfo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssds", $petName, $petType, $petBreed, $petAge, $healthInfo);

    if ($stmt->execute() === TRUE) {
        echo "New pet profile created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type=text], input[type=number], textarea {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Your Pet Profile</h2>
        <form method="post" action="">
            <input type="text" name="petName" placeholder="Pet's Name" required>
            <input type="text" name="petType" placeholder="Pet's Type" required>
            <input type="text" name="petBreed" placeholder="Pet's Breed">
            <input type="number" name="petAge" placeholder="Pet's Age">
            <textarea name="healthInfo" placeholder="Health Information"></textarea>
            <input type="submit" value="Create Profile">
        </form>
    </div>
</body>
</html>
