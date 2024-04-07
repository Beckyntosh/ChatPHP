<!DOCTYPE html>
<html>
<head>
    <title>Wine Updates Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .signup-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type=text], input[type=email] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="signup-form">
        <form action="" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Sign Up">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        
        // Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS wine_subscribers (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP
        )";
        
        if (!$conn->query($sql) === TRUE) {
            echo "Error creating table: " . $conn->error;
        }
        
        // Prevent SQL Injection
        $stmt = $conn->prepare("INSERT INTO wine_subscribers (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        
        // Set parameters and execute
        $stmt->execute();
        
        echo "<p>Thanks for signing up! We'll keep you posted on the latest wine products.</p>";
        
        $stmt->close();
        $conn->close();
    }
    ?>

</body>
</html>
