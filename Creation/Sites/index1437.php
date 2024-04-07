<?php
// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Grabbing the data from the form
    $plantName = $_POST['plantName'];
    $careSchedule = $_POST['careSchedule'];

    // Database credentials
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS plants (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    plantName VARCHAR(30) NOT NULL,
                    careSchedule VARCHAR(255) NOT NULL,
                    reg_date TIMESTAMP
                )";
        $conn->exec($sql);

        // Insert the new plant
        $sql = "INSERT INTO plants (plantName, careSchedule) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$plantName, $careSchedule]);

        echo "New record created successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add a Plant to Gardening Tracker</title>
</head>
<body>

<h2>Add a New Plant</h2>

<form method="post">
  <label for="plantName">Plant Name:</label><br>
  <input type="text" id="plantName" name="plantName" required><br>
  <label for="careSchedule">Care Schedule:</label><br>
  <textarea id="careSchedule" name="careSchedule" required></textarea><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
