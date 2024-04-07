<!DOCTYPE html>
<html>
<head>
    <title>All-In-One - Web Application</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .signup-form, .fileupload-form {
            background-color: #FFE5B2;
            width: 200px;
            padding: 30px;
            margin: 100px auto;
            border-radius: 10px;
        }
        .signup-form input[type="submit"], .fileupload-form input[type="submit"] {
            background-color: #98F898;
        }
        .stellar-space {
            background: #000;
            color: #fff;
            padding: 20px;
        }
        .stellar-space h1 {
            color: #FFD700;
        }
        .stellar-space .product, .stellar-space .user {
            border: 1px solid #FFD700;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
Add Section
    <div class="container">
        <h1>Create Profile</h1>
        <form method="POST" action="">
            <label for="name">Name:</label><br/>
            <input type="text" id="name" name="name" required><br/>
            <label for="email">Email:</label><br/>
            <input type="email" id="email" name="email" required><br/>
            <label for="password">Password:</label><br/>
            <input type="password" id="password" name="password" required><br/>
            <input type="submit" value="Submit">
        </form>
    </div>

Signup Section
    <div class="signup-form">
        <form method="post">
            <h2>Register</h2>
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            E-mail: <input type="email" name="email" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>

File Upload Section
    <div class="fileupload-form">
        <form method="post" enctype="multipart/form-data">
            <h2>Upload Avatar</h2>
            <label>Select Profile Image:</label><br/>
            <input type="file" name="file"><br/><br/>
            <input type="submit" value="Update" name="update">
        </form>
    </div>

Stellar Space Section (Replace with actual search form and results)
    <div class="stellar-space">
        <div class="container">
            <h1>Craft Beers and Automobiles</h1>
Add your search form and results here
        </div>
    </div>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling all four functionalities in one go
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        // Register/Add user
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
        echo "<p>Profile Added/Registered successfully.</p>";
    }
    if(isset($_POST["username"])) {
        // Additional Signup handling
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        // Dummy operation as the real query should consider hashing and more secure practices
        echo "<p>Additional Signup details received.</p>";
    }
    if(isset($_POST["update"])) {
        // File upload
        $UploadFolder = 'uploads';
        $filename = $_FILES['file']['name'];
        $path = $UploadFolder . "/" . $filename;
        move_uploaded_file($_FILES['file']['tmp_name'],$UploadFolder .'/'. $filename);
        // Update user's avatar
        $sql = "UPDATE users SET avatar=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $id_example = 1; // Assuming id 1 for demo
        $stmt->bind_param("si", $path, $id_example);
        $stmt->execute();
        echo "<p>Avatar updated successfully.</p>";
    }
}

$conn->close();
?>