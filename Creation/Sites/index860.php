<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #6699CC;
            color: #FFFFFF;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Camera Course Creation</h1>
    <form method="post" action="create_course.php">
        <label for="name">Course Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS courses (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table courses created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $sql = "INSERT INTO courses (name)
    VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
