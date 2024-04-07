<!DOCTYPE html>
<html>
<head>
    <title>Beauty Products Matrimonial Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #add8e6;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 60%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
        }
    </style>
</head>
<body>
<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT users.username, users.loyalty_points, products.product_name FROM users 
JOIN products on users.product_id = products.product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>User</th><th>Loyalty Points</th><th>Selected Product</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["username"]."</td>
            <td>".$row["loyalty_points"]."</td>
            <td>".$row["product_name"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No results found";
}
$conn->close();
?>
</body>
</html>