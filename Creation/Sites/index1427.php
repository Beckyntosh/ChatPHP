<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection parameters
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Attempt MySQL server connection
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare an insert statement
        $sql = "INSERT INTO plants (name, care_schedule) VALUES (:name, :care_schedule)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':name', $_REQUEST['plant_name'], PDO::PARAM_STR);
            $stmt->bindParam(':care_schedule', $_REQUEST['care_schedule'], PDO::PARAM_STR);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                echo "<script>alert('Record added successfully.')</script>";
            } else {
                echo "<script>alert('Record could not be added. Please try again.')</script>";
            }
        }
        
        // Close statement
        unset($stmt);
        
        // Close connection
        unset($pdo);
    } catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Plant to Gardening Tracker</title>
    <style>
        body { font: 14px sans-serif; text-align: center; }
        form { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Add a Plant to Your Garden</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="plant_name">Plant Name:</label>
            <input type="text" id="plant_name" name="plant_name" required>
        </div>
        <div>
            <label for="care_schedule">Care Schedule:</label>
            <input type="text" id="care_schedule" name="care_schedule" required>
        </div>
        <div>
            <input type="submit" value="Add Plant">
        </div>
    </form>
</body>
</html>
<?php
// Create table if not exists
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS plants (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        care_schedule TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

unset($pdo);
?>
