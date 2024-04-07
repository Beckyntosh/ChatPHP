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
$sql = "CREATE TABLE IF NOT EXISTS travelPlans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
flight VARCHAR(50),
hotel VARCHAR(50),
check_in_date DATE,
check_out_date DATE,
remarks TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Successfully created table
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $flight = $_POST['flight'];
    $hotel = $_POST['hotel'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $remarks = $_POST['remarks'];

    $stmt = $conn->prepare("INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $destination, $flight, $hotel, $check_in, $check_out, $remarks);

    if ($stmt->execute()) {
        echo "<p>Travel plan saved successfully!</p>";
    } else {
        echo "<p>Error saving plan: " . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Plan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; gap: 12px; }
        input, textarea, button { padding: 10px; font-size: 16px; }
        button { cursor: pointer; background-color: #007BFF; color: white; border: none; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create a Travel Plan</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <input type="text" name="destination" placeholder="Destination" required>
        <input type="text" name="flight" placeholder="Flight details">
        <input type="text" name="hotel" placeholder="Hotel details">
        <input type="date" name="check_in" placeholder="Check-in date" required>
        <input type="date" name="check_out" placeholder="Check-out date" required>
        <textarea name="remarks" placeholder="Remarks"></textarea>
        <button type="submit">Save Travel Plan</button>
    </form>
</div>
</body>
</html>
