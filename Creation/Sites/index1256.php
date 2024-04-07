<?php

$mysql_root_pwd = 'root';
$mysql_db = 'my_database';
$servername = 'db';

// Create connection
$conn = new mysqli($servername, 'root', $mysql_root_pwd, $mysql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createTablesSQL = "
CREATE TABLE IF NOT EXISTS locations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    location_id INT(6) UNSIGNED,
    date DATE,
    details TEXT,
    FOREIGN KEY (location_id) REFERENCES locations(id)
);
";
if ($conn->multi_query($createTablesSQL)) {
    do {
        // store first result set
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
                // process every row
            }
            $result->free();
        }
        // prepare next result set
    } while ($conn->next_result());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $date = $_POST['date'];
    $details = $_POST['details'];

    $sql = "INSERT INTO plans (location_id, date, details) VALUES ((SELECT id FROM locations WHERE location = ? LIMIT 1), ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $location, $date, $details);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
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
    <title>Travel Planner</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; background-color: #f0f0f0; }
        form, .content { background: #fff; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .title { font-size: 24px; text-align: center; }
    </style>
</head>
<body>

<div class="content">
    <div class="title">Plan your trip</div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required><br><br>
        
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>
        
        <label for="details">Details:</label><br>
        <textarea id="details" name="details" required></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
Given the complex nature of the request, combining both PHP and SQL without further back-end architecture information or security handling like SQL injection prevention (beyond this simple example), the provided code aims to offer a foundational starting point, acknowledging that a real-world application demands thorough attention to security, error handling, and user experience design.