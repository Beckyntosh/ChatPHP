<?php
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search_term = mysqli_real_escape_string($conn, $_POST['search']);

    $sql = "SELECT * FROM products WHERE name LIKE '%".$search_term."%'";

    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Royal Regalia Educational Real Estate Listings</title>
</head>
<body>
    <div>
        <form method="POST">
            <input type="text" name="search" placeholder="Search items" required>
            <button type="submit">Search</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($result) && $result->num_rows > 0) {   
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['name'] .
                            "</td><td>" . $row['description'] . 
                            "</td><td>" . $row['price'] .
                            "</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>