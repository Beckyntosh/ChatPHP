<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include config file
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

    // Insert travel plan into database
    $stmt = $conn->prepare("INSERT INTO travel_plans (destination, flight, hotel) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $destination, $flight, $hotel);

    $destination = $_POST['destination'];
    $flight = $_POST['flight'];
    $hotel = $_POST['hotel'];

    $stmt->execute();

    $stmt->close();
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Plan App</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type=text], select, button { width: 100%; padding: 10px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Travel Plan</h2>
    <form action="" method="post">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>

        <label for="flight">Flight:</label>
        <input type="text" id="flight" name="flight" required>

        <label for="hotel">Hotel:</label>
        <input type="text" id="hotel" name="hotel" required>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
<?php
// Create table if not exists
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    flight VARCHAR(50),
    hotel VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table travel_plans created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
