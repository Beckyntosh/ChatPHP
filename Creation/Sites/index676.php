<?php
$host = "db";
$user = "root";
$pass = "root";
$db = "my_database";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM products WHERE name LIKE '%{$search}%'";
    $result = $conn->query($query);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"]. " - Description: " . $row["description"]. "<br>";
        }
    } else {
        echo "No results found";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Children's Clothing Social Networking Site</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #333;
        color: #f0f0f0;
    }
    #search_form {
        margin-top: 20px;
    }
    #search_box {
        padding: 10px;
        border: none;
        border-radius: 5px;
    }
    #search_button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #1abc9c;
    }
    </style>
</head>
<body>
    <h1>Futuristic Flair Children's Clothing Social Network</h1>
    <div id="search_form">
        <form action="" method="POST">
            <input id="search_box" type="text" name="search" placeholder="Search tutorials...">
            <input id="search_button" type="submit" value="Search">
        </form>
    </div>
</body>
</html>