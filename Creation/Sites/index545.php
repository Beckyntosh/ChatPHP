<!DOCTYPE html>
<html>
<head>
    <title>Create Profile - Christmas Makeup Shop</title>
    <style type="text/css">
        body {
            background: #f2f2f2;
            font-family: Arial;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            font-size: 24px;
            font-weight: 300;
            color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Profile</h1>

        <?php
            $servername = "db";
            $username = "root";
            $password = "root";
            $dbname = "my_database";

            // Print an error message if connection to the MySQL server fails.
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST["name"]);
                $email = htmlspecialchars($_POST["email"]);
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                // Insert new user into database
                $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
                $stmt= $conn->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();

                echo "Profile Created Successfully";
            }
        ?>

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
</body>
</html>