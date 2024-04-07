<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_POST['search'];

//SQL for getting news related to sunglasses
$sql = "SELECT * FROM news WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sunglasses Matrimonial Site - Search News</title>
    <style>
        body{
            background-color: #000033;
            color: #fff;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        h1{
            color: #cc9900;
        }

        .news-card{
            border: 2px solid #cc9900;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Sunglasses Matrimonial Site - Search News</h1>
    <form method="POST" action="">
        <input type="text" name="search" required/>
        <input type="submit" value="Search"/>
    </form>

    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="news-card">';
                echo '<h2>' . $row["title"] . '</h2>';
                echo '<p>' . $row["content"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?> 
</body>
</html>