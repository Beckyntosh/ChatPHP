<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Product Update Notifications</title>
</head>
<body>
    <h2>Signup for Product Update Notifications</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" name="signup">Signup</button>
    </form>
    <?php
    if (isset($_POST['signup'])) {
        $email = trim($_POST['email']);

        $servername = 'db';
        $username = 'root';
        $password = 'root';
        $dbname = 'my_database';

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create table if it doesn't exist
            $createTableQuery = "CREATE TABLE IF NOT EXISTS product_updates (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(50) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            $conn->exec($createTableQuery);

            // Insert email
            $stmt = $conn->prepare("INSERT INTO product_updates (email) VALUES (:email)");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            echo "You've successfully signed up for product updates.";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>
</body>
</html>
