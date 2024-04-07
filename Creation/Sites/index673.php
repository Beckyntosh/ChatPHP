<?php
$host       = "db";
$username   = "root";
$password   = "root";
$dbname     = "my_database";
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchKey = $_POST['search'];

$sql = "SELECT * FROM products WHERE name LIKE '%$searchKey%'";

$result = $conn->query($sql);
?>

<html>
<head>
    <title>Whimsical Wonderland</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0e1f2;
        }
    </style>
</head>
<body>
    <h2>Search Design Templates</h2>

    <form method="POST" action="">
        <input type="text" name="search" placeholder="Search Templates Here">
        <input type="submit" value="Search">
    </form>

    <div>
        <?php
        if($result->num_rows >= 1) {
            while($row = $result->fetch_assoc()) {
                echo "<div><h3>".$row['name']."</h3><p>".$row['description']."</p><img src='".$row['img_url']."' alt='image'></div>";
            }
        } else {
            echo "No Results Found";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>