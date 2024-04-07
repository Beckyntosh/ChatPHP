<?php
// Set up database connection
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

// Create subscriptions table if not exists
$subscriptions_sql = "CREATE TABLE IF NOT EXISTS subscriptions (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
product_id INT,
start_date DATE,
end_date DATE,
status VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (product_id) REFERENCES products(id)
)";

if ($conn->query($subscriptions_sql) === TRUE) {
    echo "Table 'subscriptions' created successfully or already exists.";
} else {
    echo "Error creating table: " . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Glacial Grace Beauty Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #50a3a2;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #076585 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Glacial Grace Beauty Products - Subscription Management</h1>
        </div>
    </header>
    <div class="container">
        <h2>Subscription List</h2>
        <?php
        $sql = "SELECT subscriptions.id, users.username, products.name, subscriptions.start_date, subscriptions.end_date, subscriptions.status FROM subscriptions JOIN users ON subscriptions.user_id = users.id JOIN products ON subscriptions.product_id = products.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'><tr><th>ID</th><th>User</th><th>Product</th><th>Start Date</th><th>End Date</th><th>Status</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["name"]."</td><td>".$row["start_date"]."</td><td>".$row["end_date"]."</td><td>".$row["status"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>