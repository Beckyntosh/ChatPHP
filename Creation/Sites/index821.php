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

// Get users and products
$sql = "SELECT users.*, products.* FROM users JOIN products ON users.id = products.user_id";
$result = $conn->query($sql);

// HTML Beginning
echo "<!DOCTYPE html>
<html>
<head>
    <title>Language Learning Site</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #13fc03;
            font-family: 'Arial', sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even){background-color: #333}
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>";

// Table Beginning
echo "<table>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Subscription Status</th>
        </tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['username']."</td>
                <td>".$row['product_id']."</td>
                <td>".$row['product_name']."</td>
                <td>".$row['subscription_status']."</td>
              </tr>";
    }
} else {
    echo "0 results";
}

// Table and HTML Ending
echo "</table>
    </body>
</html>";

$conn->close();
?>