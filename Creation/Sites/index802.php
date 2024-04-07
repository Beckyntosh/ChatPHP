<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_POST['search'];

$sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
$result = $conn->query($sql);

echo "<style>
body {
    font-family: 'Courier New', monospace;
    background-color: #FFE4C4;
    color: #8B4513;
}
h1 {
    text-align: center;
    font-size: 2em;
}
table {
    width: 100%;
}
td, th {
    border: 1px solid #8B4513;
    text-align: left;
    padding: 8px;
}
</style>";

echo "<h1>Retro Revival Sunglasses Store</h1>";

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Product Name</th><th>Description</th><th>Price</th><th>Video URL</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["product_name"]. "</td><td>". $row["description"]. "</td><td>" . $row["price"]. "</td><td>". "<a href='". $row["video_url"]. "'>Watch Video</a>". "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>