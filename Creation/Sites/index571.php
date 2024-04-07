<?php
$host = "db";
$database = "my_database";
$user = "root";
$password = "root";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM users WHERE username = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: /"); // redirect to main page after successful login
    } else {
        // handle wrong login credentials
        echo 'Invalid username or password.';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #FF8C00;
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #F5F5F5;
            border-radius: 5px;
        }
        .form-input {
            margin-bottom: 10px;
        }
        .form-input input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .form-input label {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<form method="POST">
    <div class="form-input">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-input">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <input type="submit" value="Log in">
</form>
</body>
</html>