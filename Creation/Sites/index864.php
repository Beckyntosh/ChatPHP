<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS events (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description TEXT,
date DATE,
location VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table events created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO events (title, description, date, location) VALUES 
('Summer Sale', 'Biggest sale of the season', '2022-08-01', 'Online'),
('New Collection Launch', 'Launching our new summer collection', '2022-07-01', 'Online')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Handbags Calendar</title>
    <style>
        body { background-color: #FFDAB9; color: #FF4500; font-family: "Trebuchet MS"; }
        h1 { color: #FF4500; }
    </style>
</head>
<body>
<h1>Upcoming Events!</h1>
<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, description, date, location FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"]. "</h2><p>" . $row["description"]. "</p><p>Date: " . $row["date"]. "</p><p>Location: " . $row["location"]. "</p>";
    }
} else {
    echo "No upcoming events";
}
$conn->close();
?>
</body>
</html>