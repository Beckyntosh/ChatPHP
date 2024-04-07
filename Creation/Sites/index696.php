<?php
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

if($_POST){
    $event_date = $_POST['date'];
    $event_time = $_POST['time'];
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];

    $sql = "INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('$event_date', '$event_time', '$product_id', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<html>
<head>
    <style>
        body{
            background-color: #ADD8E6;
        }
    </style>
</head>
<body>
<form method="post" action="">
    <label for="date">Event Date:</label><br>
    <input type="date" id="date" name="date"><br>
    <label for="time">Event Time:</label><br>
    <input type="time" id="time" name="time"><br>
    <label for="product_id">Product ID:</label><br>
    <input type="number" id="product_id" name="product_id"><br>
    <label for="user_id">User ID:</label><br>
    <input type="number" id="user_id" name="user_id"><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>