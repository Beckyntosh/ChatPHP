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

// Create table if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS PetProfiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    petType VARCHAR(30) NOT NULL,
    healthInfo TEXT NOT NULL,
    regDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($table) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST["petName"];
    $petType = $_POST["petType"];
    $healthInfo = $_POST["healthInfo"];

    $sql = "INSERT INTO PetProfiles (petName, petType, healthInfo)
    VALUES ('$petName', '$petType', '$healthInfo')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
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
        body{ font-family: Arial, sans-serif; margin: 20px; }
        form{ max-width: 400px; margin: auto; }
        input[type=text], textarea { width: 100%; padding: 10px; margin: 8px 0; box-sizing: border-box; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<h2>Create a Pet Profile</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Pet Name: <input type="text" name="petName" required>
  <br><br>
  Pet Type: <input type="text" name="petType" required>
  <br><br>
  Health Info:<br> <textarea name="healthInfo" rows="5" required></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
