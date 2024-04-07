<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from form
    $clientName = $_POST['clientName'];
    $clientEmail = $_POST['clientEmail'];
    $clientPhone = $_POST['clientPhone'];

    // Database configuration
    $servername = "db";
    $username = "root";
    $password = "root"; // Not recommended for production environments
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS clients (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            phone VARCHAR(15),
            reg_date TIMESTAMP
            )";

        // Execute query
        $conn->exec($sql);

        // Prepare SQL and bind parameters
        $stmt = $conn->prepare("INSERT INTO clients (name, email, phone) VALUES (:name, :email, :phone)");
        $stmt->bindParam(':name', $clientName);
        $stmt->bindParam(':email', $clientEmail);
        $stmt->bindParam(':phone', $clientPhone);

        $stmt->execute();

        echo "New client added successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Client</title>
</head>
<body>
    <h2>Add a New Client</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="clientName">Name:</label><br>
        <input type="text" id="clientName" name="clientName" required><br>
        <label for="clientEmail">Email:</label><br>
        <input type="email" id="clientEmail" name="clientEmail" required><br>
        <label for="clientPhone">Phone:</label><br>
        <input type="tel" id="clientPhone" name="clientPhone" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
