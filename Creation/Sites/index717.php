<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$stmt->bind_result($role);
$stmt->fetch();
$stmt->close();

if($role == 'admin'){
    echo "Hello, Admin!";
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["description"]. "<br>";
        }
    } else {
        echo "0 results";
    }
} else {
    echo "Sorry, you are not allowed to view this page.";
}

$conn->close();
?>

<html>
<head>
    <title>Exotic Escape Skateboards</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('exotic_escape.jpg');
            background-size: cover;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Welcome to Exotic Escape Skateboards</h1>
    <p>Explore the collection of our exotic and unique skateboards that not only provide an exciting escape of adventure but also a way to support our charity and non-profit work.</p>
</body>
</html>