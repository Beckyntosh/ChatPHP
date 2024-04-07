

<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt MySQL server connection.
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Define variables and initialize with empty values
$event_name = $event_date = $capacity = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $event_name = trim($_POST["event_name"]);
    $event_date = trim($_POST["event_date"]);
    $capacity = trim($_POST["capacity"]);
    
    // Prepare an insert statement
    $sql = "INSERT INTO events (event_name, event_date, capacity) VALUES (?, ?, ?)";
     
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssi", $param_event_name, $param_event_date, $param_capacity);
        
        // Set parameters
        $param_event_name = $event_name;
        $param_event_date = $event_date;
        $param_capacity = $capacity;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "<script>alert('Event created successfully!');</script>";
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create Virtual Event</title>
</head>
<body>
<h2>Virtual Event Creator</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div>
        <label>Event Name:</label>
        <input type="text" name="event_name" required>
    </div>
    <div>
        <label>Event Date:</label>
        <input type="date" name="event_date" required>
    </div>
    <div>
        <label>Capacity:</label>
        <input type="number" name="capacity" min="1" required>
    </div>
    <div>
        <input type="submit" value="Create Event">
    </div>
</form>
</body>
</html>

This code provides a basic framework to create a virtual event with fields for event name, date, and capacity. Remember, this is a very simplified version and lacks many features and security measures necessary for a live application, such as validation and sanitation of input data, user authentication, and protection against SQL injection. For a real-world application, especially as part of PhD research, you would require a much more robust and secure implementation.