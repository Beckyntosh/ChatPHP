<?php
// Check if the submit button is clicked
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection variables
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";
    
    try {
        // Establish the Database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create table if it does not exist
        $sql = "CREATE TABLE IF NOT EXISTS patients (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            fullname VARCHAR(255) NOT NULL,
            email VARCHAR(50),
            pet_name VARCHAR(50),
            appointment_date DATE,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

        $conn->exec($sql);
        
        // Insert patient into the database
        $sql = "INSERT INTO patients (fullname, email, pet_name, appointment_date) VALUES (?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$_POST['fullname'], $_POST['email'], $_POST['pet_name'], $_POST['appointment_date']]);
        
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Patient to Appointment System</title>
    </head>
    <body>
        <h2>Patient Appointment Form</h2>
        <form method="post">
            <label for="fullname">Full Name:</label><br>
            <input type="text" id="fullname" name="fullname" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="pet_name">Pet Name:</label><br>
            <input type="text" id="pet_name" name="pet_name" required><br>
            <label for="appointment_date">Appointment Date:</label><br>
            <input type="date" id="appointment_date" name="appointment_date" required><br><br>
            <input type="submit" value="Submit">
        </form> 
    </body>
</html>