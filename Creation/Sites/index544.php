<?php
// Configurations
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables
$tables = [
    'CREATE TABLE IF NOT EXISTS subscribers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        subscription_date DATE,
        subscription_status VARCHAR(50),
        FOREIGN KEY (user_id) REFERENCES users(id)
    );'
];

foreach ($tables as $k => $sql) {
    $query = @$conn->query($sql);
}

// Print page based on $_GET['page']
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// HTML layout
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Photography Showcase Site</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #F5F5F5; color: #333; }
        .container { max-width: 1200px; margin: auto; padding: 20px; }
        .header, .footer { text-align: center; margin: 20px 0; }
        h1 { color: #556B2F; }
        .mountain-majesty-theme { background-color: #BDB76B; padding: 10px; margin: 20px 0; border-radius: 8px; }
        nav ul { list-style: none; padding: 0; }
        nav ul li { display: inline; margin-right: 10px; }
        a { text-decoration: none; color: #556B2F; }
        .content { margin: 20px 0; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Shoes Photography Showcase: Mountain Majesty</h1>
        <nav>
            <ul>
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=subscribers">Manage Subscriptions</a></li>
            </ul>
        </nav>
    </div>
    <div class="mountain-majesty-theme">
        <div class="content">
            <?php if ($page === 'home') { ?>
            <p>Welcome to our Shoes Photography Showcase Site. Explore our mountain majesty themed products!</p>
            <?php } elseif ($page === 'subscribers') { ?>
                <h2>Subscribers Management</h2>
                <?php
                $sql = "SELECT users.username, subscribers.subscription_date, subscribers.subscription_status FROM subscribers JOIN users ON subscribers.user_id = users.id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr><th>Username</th><th>Subscription Date</th><th>Status</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>". $row["username"]. "</td><td>" . $row["subscription_date"]. "</td><td>" . $row["subscription_status"]. "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No subscribers found";
                }
                ?>
            <?php } ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 Shoes Photography Showcase Site</p>
    </div>
</div>
</body>
</html>
<?php
// Close connection
$conn->close();
?>