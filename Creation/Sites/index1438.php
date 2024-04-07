<!DOCTYPE html>
<html>
<head>
    <title>Add a Plant to Gardening Tracker</title>
</head>
<body>
    <h1>Add a New Plant</h1>
    <form action="add_plant.php" method="post">
        <label for="plant_name">Plant Name:</label><br>
        <input type="text" id="plant_name" name="plant_name"><br>
        <label for="care_schedule">Care Schedule:</label><br>
        <textarea id="care_schedule" name="care_schedule"></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect value of input field
        $plant_name = $_POST['plant_name'];
        $care_schedule = $_POST['care_schedule'];

        if (empty($plant_name) || empty($care_schedule)) {
            echo "Plant Name or Care Schedule is empty";
        } else {
            // Database connection
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

            $sql = "INSERT INTO plants (plant_name, care_schedule)
            VALUES ('$plant_name', '$care_schedule')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
    ?>
</body>
</html>
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

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table plants created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
