<?php
// Set connection variables
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

// SQL to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table PetProfiles created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle the post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST["petName"];
    $petType = $_POST["petType"];
    $healthInfo = $_POST["healthInfo"];

    $stmt = $conn->prepare("INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $petName, $petType, $healthInfo);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>New pet profile created successfully for " . htmlspecialchars($petName) . "!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
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
            background-color: #f2e6ff;
            color: #663399;
            margin: 20px;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input[type=text], textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #663399;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Pet Profile</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="petName">Pet Name:</label>
            <input type="text" id="petName" name="petName" required>
            
            <label for="petType">Pet Type:</label>
            <input type="text" id="petType" name="petType" required>

            <label for="healthInfo">Health Information:</label>
            <textarea id="healthInfo" name="healthInfo"></textarea>

            <input type="submit" value="Create Profile">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
