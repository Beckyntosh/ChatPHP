<?php
    $server = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $search = $_POST['search'];

    $sql = "SELECT * FROM videos WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Title: " . $row["title"]. " Description: " . $row["description"]. "<br>";
        }
    } else {
        echo "No results found";
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prescription Medications Travel and Tourism</title>
    <style>
        body {
            font-family: 'Lucida Console', Monaco, monospace;
            background-color: #f0f0f0;
            color: #333;
        }
        form {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="search" required>
        <input type="submit" value="Search">
    </form>
</body>
</html>