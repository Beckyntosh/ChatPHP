<?php
// Database connection setup
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Create AddressBook table if it doesn't exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS AddressBook (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        email VARCHAR(100),
        phone VARCHAR(30),
        address TEXT
    )";

    $conn->exec($sql);
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    die();
}

// Handle POST request to insert data
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
  
    try {
        $sql = "INSERT INTO AddressBook (name, email, phone, address)
        VALUES ('$name', '$email', '$phone', '$address')";
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book Management</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F4A460; /* sandy brown */
            color: #8B4513; /* saddle brown */
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #FFDEAD; /* navajowhite */
            padding: 20px;
            border-radius: 10px;
        }
        input[type=text], input[type=email], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }
        input[type=submit] {
            backgroundColor: #8B4513;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #7B3F00;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Contact</h2>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" required>

        <label for="address">Address</label>
        <textarea id="address" name="address" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>