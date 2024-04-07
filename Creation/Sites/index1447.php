<?php
// Create connection to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plantName = $_POST['plantName'];
    $careSchedule = $_POST['careSchedule'];

    // Insert into database
    $sql = "INSERT INTO Plants (name, care_schedule) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $plantName, $careSchedule);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

// Create Plants table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    care_schedule TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table Plants created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Plant to Gardening Tracker</title>
</head>
<body>

<h2>Plant Entry Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="plantName">Plant Name:</label><br>
  <input type="text" id="plantName" name="plantName" required><br>
  <label for="careSchedule">Care Schedule:</label><br>
  <textarea id="careSchedule" name="careSchedule" rows="4" cols="50" required></textarea><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
