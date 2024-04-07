<?php
// Database connection
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

// Create users table if not exists
$sql = "CREATE TABLE IF NOT EXISTS profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    address VARCHAR(255),
    phone VARCHAR(20),
    CONSTRAINT fk_user
        FOREIGN KEY(user_id) 
        REFERENCES users(id)
        ON DELETE CASCADE
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Process the form
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO profiles (user_id, address, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $address, $phone);

    if ($stmt->execute()) {
        $message = 'Profile added successfully';
    } else {
        $message = 'Error: ' . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Entry | Desktop Computers Marketplace</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-color: #f4e9cd;
            color: #3a3b3c;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2, p {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input, button {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            background-color: #8a7357;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Profile Entry Form</h2>
    <p>Add your profile information to our Heritage Haven themed marketplace:</p>

    <?php if ($message): ?>
    <p><?= $message; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>

        <button type="submit">Submit Profile</button>
    </form>
</div>

</body>
</html>