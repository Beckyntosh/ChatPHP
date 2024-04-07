<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create tables if not exists
$volunteersTable = "CREATE TABLE IF NOT EXISTS volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(15),
    event_id INT(6),
    registration_date TIMESTAMP
)";

if ($conn->query($volunteersTable) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

$eventsTable = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(50) NOT NULL,
    event_date DATE NOT NULL,
    event_location VARCHAR(100),
    description TEXT
)";

if ($conn->query($eventsTable) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Handle Volunteer SignUp Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event_id = $_POST['event_id'];

    $sql = "INSERT INTO volunteers (fullname, email, phone, event_id) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param("sssi", $param_fullname, $param_email, $param_phone, $param_event_id);

        $param_fullname = $fullname;
        $param_email = $email;
        $param_phone = $phone;
        $param_event_id = $event_id;

        if($stmt->execute()){
            echo "Volunteer registered successfully.";
        } else{
            echo "Error. Please try again later.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Sign-Up</title>
</head>
<body>
    <h2>Signup to Volunteer</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br>
        <label for="event">Select Event:</label><br>
        <select id="event_id" name="event_id" required>
            <option value="1">Local Charity Event 1</option>
            <option value="2">Local Charity Event 2</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
