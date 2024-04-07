<?php
$host = "db";
$dbname = "my_database";
$username = "root";
$password = "root";
$charset = "utf8mb4";

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $pdo = new PDO($dsn, $username, $password);
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Structure of enrolment table
    $enrolment_table = "CREATE TABLE IF NOT EXISTS enrolment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT
    )";
    $conn->query($enrolment_table);

    // Structure of users table
    $users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
    )";
    $conn->query($users_table);

    // Structure of events table
    $events_table = "CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    date DATE,
    location VARCHAR(255)
    )";
    $conn->query($events_table);

    // Function: Enroll Course by user_id and product_id
    function enrollCourse($conn, $user_id, $product_id) {
        $sql = "INSERT INTO enrolment (user_id, product_id)
        VALUES ($user_id, $product_id)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// Login functionality
$login_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $results = $conn->query($query);
        if ($results->num_rows > 0) {
            echo "Login successful. Welcome " . $username;
        } else {
            $login_error = "Invalid username or password!";
        }
    } else {
        $login_error = "Username and password are required!";
    }
}
?>
<html>
<head>
    <style>
        body {
            background-image: url('beach.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        form {
            border: 3px solid #2F4F4F;
            width: 30%;
            margin: auto;
            padding: 20px;
        }
        h1, h2 {
            color: #2F4F4F;
        }
        .error {
            color: red;
        }
    </style>
    <title>Mixed Topics Site</title>
</head>
<body>
    <h1>Welcome to Mixed Topics Site</h1>
    <h2>Login to your account</h2>
    <form method="post" action="">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    <p class="error"><?php echo $login_error; ?></p>
    <h2>Upcoming Events!</h2>
    <?php
    $sql = "SELECT id, title, description, date, location FROM events";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h3>" . $row["title"]. "</h3><p>" . $row["description"]. "</p><p>Date: " . $row["date"]. "</p><p>Location: " . $row["location"]. "</p>";
        }
    } else {
        echo "No upcoming events";
    }
    ?>
</body>
</html>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    if($fileType != "php" ) {
        echo "Sorry, only PHP files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
