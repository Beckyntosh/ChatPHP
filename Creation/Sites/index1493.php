<?php

// Database Configuration
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    contact_email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert client if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name']) && !empty($_POST['contact_email'])) {
    $name = $_POST['name'];
    $contact_email = $_POST['contact_email'];

    $stmt = $conn->prepare("INSERT INTO clients (name, contact_email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $contact_email);

    if ($stmt->execute()) {
        echo "New client added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Client to CRM</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#clientForm").submit(function (event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "",
                    data: $(this).serialize(),
                    success: function (response) {
                        $("#result").html(response);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h2>Add a Client to CRM System</h2>
    <form id="clientForm">
        <label for="name">Client Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="contact_email">Contact Email:</label>
        <input type="email" id="contact_email" name="contact_email" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <div id="result"></div>
</body>
</html>
