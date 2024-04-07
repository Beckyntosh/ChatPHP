<?php
// Check if form was submitted:
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_client'])) {
    // Database configurations
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

    $client_name = $conn->real_escape_string($_POST['client_name']);
    $contact_email = $conn->real_escape_string($_POST['contact_email']);
    $contact_phone = $conn->real_escape_string($_POST['contact_phone']);

    // sql to create table if not exists
    $sql_table = "CREATE TABLE IF NOT EXISTS clients (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        client_name VARCHAR(100) NOT NULL,
        contact_email VARCHAR(50) NOT NULL,
        contact_phone VARCHAR(20),
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql_table) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Insert new client into the table
    $sql_insert = "INSERT INTO clients (client_name, contact_email, contact_phone)
    VALUES ('" . $client_name . "', '" . $contact_email . "', '" . $contact_phone . "')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<div style='background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0;'>New client added successfully</div>";
    } else {
        echo "<div style='background-color: #f44336; color: white; padding: 14px 20px; margin: 8px 0;'>Error: " . $sql_insert . "<br>" . $conn->error."</div>";
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Client to CRM</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0e4d7; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background-color: white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; font-size: 24px; }
        input[type="text"], input[type="email"], input[type="submit"] { width: 100%; padding: 15px; margin: 10px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        input[type="submit"] { background-color: #4CAF50; color: white; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Add New Client</h2>
        <form action="" method="POST">
            <label for="client_name">Client Name:</label>
            <input type="text" id="client_name" name="client_name" required>

            <label for="contact_email">Contact Email:</label>
            <input type="email" id="contact_email" name="contact_email" required>

            <label for="contact_phone">Contact Phone:</label>
            <input type="text" id="contact_phone" name="contact_phone" required>

            <input type="submit" name="submit_client" value="Add Client">
        </form>
    </div>

</body>
</html>
