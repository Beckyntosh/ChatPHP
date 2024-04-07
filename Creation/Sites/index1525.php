<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Change these values according to your database configuration
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

    // Escape user inputs for security
    $module_name = mysqli_real_escape_string($conn, $_POST['module_name']);
    $vocabulary = mysqli_real_escape_string($conn, $_POST['vocabulary']); // Expected to be a JSON string

    // Attempt insert query execution
    $sql = "INSERT INTO language_modules (module_name, vocabulary) VALUES ('$module_name', '$vocabulary')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vocabulary Module</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Vocabulary Module - Spanish for Beginners</h2>
        <form action="" method="post">
            <label for="module_name">Module Name:</label><br>
            <input type="text" id="module_name" name="module_name" required><br><br>
            <label for="vocabulary">Vocabulary (JSON format):</label><br>
            <textarea id="vocabulary" name="vocabulary" rows="10" required></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    
    <?php
    // Create table if it does not exist
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // SQL to create table
    $sql = "CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_name VARCHAR(255) NOT NULL,
    vocabulary TEXT NOT NULL,
    reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "<script>console.log('Table language_modules created successfully');</script>";
    } else {
        echo "<script>console.log('Error creating table: " . $conn->error . "');</script>";
    }

    $conn->close();
    ?>
</body>
</html>
