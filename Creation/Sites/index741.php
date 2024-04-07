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

// Create users table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30),
name VARCHAR(30),
email VARCHAR(50),
password VARCHAR(255)
);";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Register functionality
$usernameError = $passwordError = $emailError = $nameError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // simple validation (real-world scenario should have more comprehensive validation)
    if (empty($_POST["username"])) {
        $usernameError = "Username is required";
    } else {
        $username = $_POST["username"];
    }

    if (empty($_POST["password"])) {
        $passwordError = "Password is required";
    } else {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Encrypt password
    }

    if (empty($_POST["email"])) {
        $emailError = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["name"])) {
        $nameError = "Name is required";
    } else {
        $name = $_POST["name"];
    }

    if ($username && $password && $email && $name) {
        $sql = "INSERT INTO users (username, name, email, password)
        VALUES ('$username', '$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Beauty Products Charity</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #fdfaf6;
            color: #6f4e37;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2e9e4;
            margin-top: 50px;
        }
        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #6f4e37;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #56382f;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register to Beauty Products Charity</h2>
    <p>Please fill in this form to create an account.</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name">
        <span class="error"><?php echo $nameError;?></span><br>
        Username: <input type="text" name="username">
        <span class="error"><?php echo $usernameError;?></span><br>
        Email: <input type="email" name="email">
        <span class="error"><?php echo $emailError;?></span><br>
        Password: <input type="password" name="password">
        <span class="error"><?php echo $passwordError;?></span><br>
        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>
<?php
$conn->close();
?>