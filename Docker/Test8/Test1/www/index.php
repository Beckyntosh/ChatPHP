<!DOCTYPE html>
<html>
<head>
    <title>Valentine's Makeup Webshop - User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: pink;
            color: red;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register for Valentine's Makeup Webshop</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="register" value="Register">
    </form>
</div>

<?php
if (isset($_POST['register'])) {
    $servername = "db";
    $username = "root";
    $password = "root_password";
    $dbname = "my_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO users (username, email, password)
    VALUES ('$user', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>New record created successfully</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $conn->close();
}
?>

</body>
</html>
