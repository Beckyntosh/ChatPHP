<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Product Updates</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdf1f1;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #d10056;
        }
        form {
            background-color: #ffffff;
            display: inline-block;
            padding: 20px;
            border: 2px solid #f3c1c6;
            border-radius: 15px;
        }
        input[type="text"], input[type="email"] {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 240px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        input[type="submit"] {
            background-color: #d10056;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #b7004d;
        }
    </style>
</head>
<body>
    <h1>Sign Up for Product Updates</h1>
    <form action="index.php" method="post">
        <input type="text" name="name" required placeholder="Your Name"/>
        <input type="email" name="email" required placeholder="Your Email"/>
        <input type="submit" name="submit" value="Sign Up"/>
    </form>
    <?php
        if(isset($_POST['submit'])) {
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

            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);

            // Attempt to create table if not exists
            $sql = "CREATE TABLE IF NOT EXISTS product_updates (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                reg_date TIMESTAMP
            )";

            if ($conn->query($sql) === TRUE) {
                $sql = "INSERT INTO product_updates (name, email) VALUES ('$name', '$email')";
                if ($conn->query($sql) === TRUE) {
                    echo "<p style='color: #d10056;'>Thanks for signing up, $name! You will now receive updates on our latest products.</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error creating table: " . $conn->error;
            }

            $conn->close();
        }
    ?>
</body>
</html>
