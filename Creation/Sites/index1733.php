<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection variables
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

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $petName, $petType, $age, $healthInfo);

    // Set parameters and execute
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $age = $_POST['age'];
    $healthInfo = $_POST['healthInfo'];
    
    $stmt->execute();

    echo "New pet profile created successfully";

    $stmt->close();
    $conn->close();
} else {
    // HTML form for creating a pet profile
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Create Pet Profile</title>
    </head>
    <body>
        <h2>Create a Profile for Your Pet</h2>
        <form method="post" action="">
            <label for="petName">Pet Name:</label><br>
            <input type="text" id="petName" name="petName" required><br>
            <label for="petType">Pet Type:</label><br>
            <input type="text" id="petType" name="petType" required><br>
            <label for="age">Age:</label><br>
            <input type="number" id="age" name="age" required><br>
            <label for="healthInfo">Health Info:</label><br>
            <textarea id="healthInfo" name="healthInfo" required></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </body>
    </html>
    <?php
}
?>
