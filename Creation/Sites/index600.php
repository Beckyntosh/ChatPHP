<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query
$sql = "SELECT u.name, p.title, p.time FROM users u, products p WHERE u.id = p.user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<!DOCTYPE html>
        <html>
        <body>
        <style>
            body {
                background-color: #FAEBD7;
                color: #8B4513;
                font-family: Courier New;
            }
        </style>
        <h2>Online Ticket Booking Feed</h2>
        <table>
                <tr>
                    <th>User</th>
                    <th>Product</th>
                    <th>Time</th>
                </tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["title"]. "</td><td>" . $row["time"]. "</td></tr>";
    }
    echo "</table></body></html>";
} else {
    echo "0 results";
}
$conn->close();
?>