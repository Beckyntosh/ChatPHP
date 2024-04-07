<!DOCTYPE html>
<html>
<head>
    <title>Musical Instruments Environmental Awareness Site</title>
    <style>
        body {background-color: #fbeec2; font-family: georgia; color: #503d22;}
        h1 {text-align: center;}
        input[type=text] {width: 60%; padding: 10px;}
        input[type=submit] {background-color: #503d22; color: white; padding: 10px 20px;}
    </style>
</head>

<body>
    <h1>Musical Instruments Environmental Awareness Site</h1>
    <form action="" method="post">
        <input type="text" name="searchkey" placeholder="Search product...">
        <input type="submit" name="submit" value="Search">
    </form>

    <?php
    $server = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['submit'])){
        $searchkey = $_POST['searchkey'];
        $sql = "SELECT * FROM products WHERE name LIKE '%$searchkey%'";       

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Product name: " . $row["name"]. "<br>";
            }
        } else {
            echo "0 results";
        } 
    }

    $conn->close();
    ?>
</body>
</html>