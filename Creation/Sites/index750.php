<!DOCTYPE html>
<html>
<head>
    <title>Spirits Online Grocery Store</title>
    <style>
        /* Add your Opulent Odyssey theme CSS here */
    </style>
</head>
<body>

<h2>Search Resumes</h2>

<form method="post">
    <input type="text" name="keyword" placeholder="Search..." required>
    <input type="submit" name="submit" value="Search">
</form>

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

if ($_POST['submit']) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM users WHERE resume LIKE '%$keyword%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}  
$conn->close();
?>

</body>
</html>