<?php
// Database connection parameters
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

// Initialize tables if not exists
function initDatabase($conn) {
    $initSql = [
        "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            description TEXT,
            category VARCHAR(100),
            price DECIMAL(10, 2),
            stock_quantity INT
        );",
       "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
            ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
            ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
            ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
            ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
            ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
            ('Product F', 'Description of Product F', 'Category3', 69.99, 90);",
        "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30),
            name VARCHAR(30),
            email VARCHAR(50),
            password VARCHAR(255)
        );",
        "INSERT INTO users (username, name, email, password) VALUES
            ('user1', 'User One', 'user1@example.com', 'password1'),
            ('user2', 'User Two', 'user2@example.com', 'password2'),
            ('user3', 'User Three', 'user3@example.com', 'password3');",
        "CREATE TABLE IF NOT EXISTS gift_cards (
            id INT AUTO_INCREMENT PRIMARY KEY,
            code VARCHAR(50),
            value DECIMAL(10, 2),
            is_redeemed BOOLEAN DEFAULT FALSE
        );",
        "CREATE TABLE IF NOT EXISTS redeemed_gift_cards (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            gift_card_id INT,
            redeemed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (gift_card_id) REFERENCES gift_cards(id)
        );",
    ];

    foreach ($initSql as $sql) {
        if (!$conn->query($sql)) {
            echo "Error creating table or inserting data: " . $conn->error;
        }
    }
}

// Call initialization function to setup database
initDatabase($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfumes Religious Organization - Gift Card Redemption</title>
    <style>
        body {
            background-color: #e4e4e4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url(urban_jungle_background.jpg) no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        input, button {
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Redeem Your Gift Card</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="code" placeholder="Enter your gift card code" required>
            <button type="submit" name="redeem">Redeem</button>
        </form>
        <?php
        if (isset($_POST['redeem'])) {
            $code = $_POST['code'];
            // Assuming for demo purpose, user_id is fetched from session or similar
            $user_id = 1;

            $sql = "SELECT * FROM gift_cards WHERE code = ? AND is_redeemed = 0 LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $code);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                // Update the gift card as redeemed
                $updateSql = "UPDATE gift_cards SET is_redeemed = 1 WHERE id = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("i", $row['id']);
                $updateStmt->execute();

                // Insert record into redeemed_gift_cards
                $insertSql = "INSERT INTO redeemed_gift_cards (user_id, gift_card_id) VALUES (?, ?)";
                $insertStmt = $conn->prepare($insertSql);
                $insertStmt->bind_param("ii", $user_id, $row['id']);
                $insertStmt->execute();

                echo "<p>Gift card redeemed successfully! Value: $" . $row['value'] . "</p>";
            } else {
                echo "<p>Invalid code or card already redeemed.</p>";
            }
        }
        ?>
    </div>
</body>
</html>