<?php
// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    $name = $_POST['name'];
    $email = $_POST['email'];
    $language = $_POST['language'];

    $sql = "INSERT INTO users (name, email, language_preference) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $language);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - Hair Care Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #eee;
            padding: 20px;
        }
        form {
            background-color: #222;
            padding: 20px;
            border-radius: 5px;
        }
        input, select {
            padding: 10px;
            margin: 10px;
            width: calc(100% - 22px);
            box-sizing: border-box;
        }
        input[type=submit] {
            background-color: #05c46b;
            color: #fff;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #0be881;
        }
    </style>
</head>
<body>

<h2>Create Your Account</h2>

<form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="language">Preferred Language:</label>
    <select id="language" name="language" required>
        <option value="en">English</option>
        <option value="fr">French</option>
        <option value="es">Spanish</option>
    </select>

    <input type="submit" value="Signup">
</form>

</body>
</html>

Note: This script assumes that a MySQL database named `my_database` is already created and contains a table named `users` with columns for `name`, `email`, and `language_preference`. You may need to adjust database credentials and structure according to your actual setup. No SQL script for database/schema creation is included here.