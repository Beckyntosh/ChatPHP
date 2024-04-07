<?php
// Connection Variables
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

// Create volunteers table if not exists
$sql = "CREATE TABLE IF NOT EXISTS volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(50),
    age INT,
    skills TEXT,
    availability TEXT
);";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert volunteer if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $skills = $_POST["skills"];
    $availability = $_POST["availability"];
    
    $sql = "INSERT INTO volunteers (name, email, age, skills, availability) 
            VALUES (?, ?, ?, ?, ?);";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiis", $name, $email, $age, $skills, $availability);
    
    if ($stmt->execute() === TRUE) {
        echo "<p>Thank you for signing up, $name!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Sign-Up</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f4eae6;
            color: #5c2e4e;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        input, textarea, button {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Volunteer Sign-up to Help With the Wines Carrier</h2>
        <form method="POST" action="">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            
            <label for="age">Age:</label><br>
            <input type="number" id="age" name="age" required><br>
            
            <label for="skills">Skills:</label><br>
            <textarea id="skills" name="skills"></textarea><br>
            
            <label for="availability">Availability:</label><br>
            <textarea id="availability" name="availability"></textarea><br>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>