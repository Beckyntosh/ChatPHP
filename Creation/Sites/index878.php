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
    <?php
    $servername = 'db';
    $username = 'root';
    $password = 'root';
    $dbname = 'my_database';
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search_term = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM products WHERE name LIKE '%".$search_term."%'";
        $result = $conn->query($sql);
    }
    ?>
    <form method="POST" action="">
        <input type="text" name="search" placeholder="Search items" required>
        <button type="submit">Search</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($result) && $result->num_rows > 0) {   
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['name'] .
                        "</td><td>" . $row['description'] . 
                        "</td><td>" . $row['price'] .
                        "</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="upload">
    </form>
</body>
</html>