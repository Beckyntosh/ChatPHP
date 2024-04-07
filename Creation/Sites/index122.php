<?php
// Connection parameters
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
$createTable = "CREATE TABLE IF NOT EXISTS Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(15),
    appointment_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTable) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $appointment_date = $_POST['appointment_date'];

    $stmt = $conn->prepare("INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $phone, $appointment_date);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient to Appointment System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; }
        input, button { width: 100%; padding: 10px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Patient</h2>
        <form action="" method="post">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="phone" placeholder="Phone">
            <input type="date" name="appointment_date" placeholder="Appointment Date" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>