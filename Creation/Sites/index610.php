<!DOCTYPE html>
<html>
<head>
    <style>
        body { 
            background-color: #FFB6C1;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php
        $host = 'db';
        $user = 'root';
        $pass = 'root';
        $dbname = 'my_database';

        $conn = new mysqli($host, $user, $pass, $dbname);

        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

            if($conn->query($query) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }

            $conn->close();
        }
    ?>
    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>