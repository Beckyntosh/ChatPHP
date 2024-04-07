<?php
$server = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $product = $_POST["product"];
    $date = $_POST["date"];

    $sql = "INSERT INTO meetings (user, product, date) VALUES ('$user', '$product', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "New meeting scheduled successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mediterranean Marvel | Schedule Meeting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #457b9d;
        }
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #457b9d;
            border-radius: 10px;
        }
        input[type="submit"] {
            background-color: #457b9d;
            color: #f0f8ff;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="user">User:</label><br>
        <input type="text" id="user" name="user"><br>
        <label for="product">Product:</label><br>
        <input type="text" id="product" name="product"><br>
        <label for="date">Date:</label><br>
        <input type="datetime-local" id="date" name="date"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>