<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $petName = $_POST["petName"];
    $petType = $_POST["petType"];
    $healthInfo = $_POST["healthInfo"];
    
    $sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('$petName', '$petType', '$healthInfo')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        input, textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h2>Create Your Pet's Profile</h2>
    <form method="POST" action="">
        <label for="petName">Pet's Name:</label><br>
        <input type="text" id="petName" name="petName" required><br>

        <label for="petType">Pet's Type (e.g., Dog, Cat):</label><br>
        <input type="text" id="petType" name="petType" required><br>

        <label for="healthInfo">Health Information:</label><br>
        <textarea id="healthInfo" name="healthInfo" rows="4" required></textarea><br>
        
        <input type="submit" value="Create Profile">
    </form> 
</body>
</html>

<?php
// Create database and table if not exists
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
