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

// Create tables if they do not exist
$clientTable = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(15),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$interactionLogTable = "CREATE TABLE IF NOT EXISTS interaction_logs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    clientId INT(6) UNSIGNED,
    interaction VARCHAR(255) NOT NULL,
    interactionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (clientId) REFERENCES clients(id)
    )";

$conn->query($clientTable);
$conn->query($interactionLogTable);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert client into database
    $stmt = $conn->prepare("INSERT INTO clients (firstName, lastName, email, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $phone);
    $stmt->execute();
    $last_id = $stmt->insert_id;

    // Assuming interaction is being posted as well. In a real scenario, interactions will be managed differently.
    $interaction = $_POST['interaction'];
    $stmt = $conn->prepare("INSERT INTO interaction_logs (clientId, interaction) VALUES (?, ?)");
    $stmt->bind_param("is", $last_id, $interaction);
    $stmt->execute();

    echo "New client added successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <title>Add a Client to CRM System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        input[type=text], input[type=email], input[type=tel] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add a New Client</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone">

For simplicity, adding interaction in the same form
        <label for="interaction">Interaction Details:</label>
        <input type="text" id="interaction" name="interaction">

        <input type="submit" value="Add Client">
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>