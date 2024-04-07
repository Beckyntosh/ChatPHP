<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Connect to database
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
    
    if (isset($_POST['signup'])) {
        // Signup form submitted
        
        // Sanitize and prepare user input
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        
        // Insert user into database
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else if (isset($_POST['book'])) {
        // Booking form submitted
        
        $userId = $conn->real_escape_string($_POST['userId']);
        $appointmentDate = $conn->real_escape_string($_POST['appointmentDate']);
        
        $sql = "INSERT INTO appointments (userId, date) VALUES ('$userId', '$appointmentDate')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Appointment booked successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Machiavellian Organic Foods - Signup and Book Appointment</title>
</head>
<body>
    <h1>Welcome to Machiavellian Organic Foods</h1>
    <section>
        <h2>User Signup</h2>
        <form method="post" action="">
            <input type="hidden" name="signup">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Signup">
        </form>
    </section>
    <section>
        <h2>Book Dental Appointment</h2>
        <form method="post" action="">
            <input type="hidden" name="book">
            <label for="userId">User ID:</label>
            <input type="number" id="userId" name="userId" required><br>
            <label for="appointmentDate">Appointment Date (YYYY-MM-DD):</label>
            <input type="date" id="appointmentDate" name="appointmentDate" required><br>
            <input type="submit" value="Book Appointment">
        </form>
    </section>
</body>
</html>
Note: Remember to create the `users` and `appointments` tables in your database before proceeding with this script. The table structures can be simple:
- For `users`, fields might be `id INT AUTO_INCREMENT PRIMARY KEY`, `name VARCHAR(255)`, `email VARCHAR(255)`, `password TEXT`.
- For `appointments`, fields might be `id INT AUTO_INCREMENT PRIMARY KEY`, `userId INT`, `date DATE`.