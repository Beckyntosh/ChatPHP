<?php

// Set up connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create tables if they do not exist
$travelPlanTable = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT,
    hotel_details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($travelPlanTable)) {
    die("ERROR: Could not create table. " . $conn->error);
}

// Check if form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    // Prepare an insert statement
    $sql = "INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES (?, ?, ?, ?, ?)";
     
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssss", $param_destination, $param_departure_date, $param_return_date, $param_flight_details, $param_hotel_details);
        
        // Set parameters
        $param_destination = $_POST['destination'];
        $param_departure_date = $_POST['departure_date'];
        $param_return_date = $_POST['return_date'];
        $param_flight_details = $_POST['flight_details'];
        $param_hotel_details = $_POST['hotel_details'];
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            header("location: " . $_SERVER['PHP_SELF']);
            exit();
        } else{
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Plan App</title>
    <style>
        body{ font: 14px sans-serif; text-align: center; }
        form { display: inline-block; margin-top: 20px;}
        label { margin: 10px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Create a Travel Plan</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Destination</label>
                <input type="text" name="destination" required>
            </div>
            <div class="form-group">
                <label>Departure Date</label>
                <input type="date" name="departure_date" required>
            </div>
            <div class="form-group">
                <label>Return Date</label>
                <input type="date" name="return_date" required>
            </div>
            <div class="form-group">
                <label>Flight Details</label>
                <textarea name="flight_details" required></textarea>
            </div>
            <div class="form-group">
                <label>Hotel Details</label>
                <textarea name="hotel_details" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Create Plan">
            </div>
        </form>
        <h3>Your Travel Plans</h3>
        <div>
            <?php
                $sql = "SELECT * FROM travel_plans";
                if($result = $conn->query($sql)){
                    while($row = $result->fetch_array()){
                        echo "<div><p><strong>Destination:</strong> {$row['destination']}</p>";
                        echo "<p><strong>Departure:</strong> {$row['departure_date']}</p>";
                        echo "<p><strong>Return:</strong> {$row['return_date']}</p>";
                        echo "<p><strong>Flight Details:</strong> {$row['flight_details']}</p>";
                        echo "<p><strong>Hotel Details:</strong> {$row['hotel_details']}</p></div>";
                    }
                    $result->free();
                } else{
                    echo "ERROR: Could not able to execute $sql. " . $conn->error;
                }
                // Close connection
                $conn->close();
            ?>
        </div>
    </div>    
</body>
</html>
