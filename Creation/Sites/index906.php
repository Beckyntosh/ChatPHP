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

<?php
// Configurations
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables
$tables = [
    'CREATE TABLE IF NOT EXISTS subscribers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        subscription_date DATE,
        subscription_status VARCHAR(50),
        FOREIGN KEY (user_id) REFERENCES users(id)
    );'
];

foreach ($tables as $k => $sql) {
    $query = @$conn->query($sql);
}

// Print page based on $_GET['page']
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// HTML layout
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Photography Showcase Site</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #F5F5F5; color: #333; }
        .container { max-width: 1200px; margin: auto; padding: 20px; }
        .header, .footer { text-align: center; margin: 20px 0; }
        h1 { color: #556B2F; }
        .mountain-majesty-theme { background-color: #BDB76B; padding: 10px; margin: 20px 0; border-radius: 8px; }
        nav ul { list-style: none; padding: 0; }
        nav ul li { display: inline; margin-right: 10px; }
        a { text-decoration: none; color: #556B2F; }
        .content { margin: 20px 0; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Shoes Photography Showcase: Mountain Majesty</h1>
        <nav>
            <ul>
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=subscribers">Manage Subscriptions</a></li>
            </ul>
        </nav>
    </div>
    <div class="mountain-majesty-theme">
        <div class="content">
            <?php if ($page === 'home') { ?>
            <p>Welcome to our Shoes Photography Showcase Site. Explore our mountain majesty themed products!</p>
            <?php } elseif ($page === 'subscribers') { ?>
                <h2>Subscribers Management</h2>
                <?php
                $sql = "SELECT users.username, subscribers.subscription_date, subscribers.subscription_status FROM subscribers JOIN users ON subscribers.user_id = users.id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr><th>Username</th><th>Subscription Date</th><th>Status</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>". $row["username"]. "</td><td>" . $row["subscription_date"]. "</td><td>" . $row["subscription_status"]. "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No subscribers found";
                }
                ?>
            <?php } ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 Shoes Photography Showcase Site</p>
    </div>
</div>
</body>
</html>
<?php
// Close connection
$conn->close();
?>

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

if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "Login successful!";
    //Start your session here
  } else {
    echo "Invalid login!";
  }
}

$conn->close();
?>

<html>
<body style="color: navy; background-color: lightblue;">
<h2>Nautical Navigator Themed Travel Online Comic and Graphic Novel Library Login</h2>
<form action="" method="POST">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password">
  <input type="submit" value="Submit">
</form>
</body>
</html>

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

// Create tables if they don't exist
$initSQL = [
  "CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )",
  "INSERT INTO comments (user_id, product_id, comment) VALUES
  (1, 1, 'Great tablet for e-learning!'),
  (2, 3, 'Really helpful in online tutoring sessions.'),
  (3, 2, 'Battery life could be better.');"
];

foreach ($initSQL as $query) {
  if (!$conn->query($query)) {
    echo "Error creating table or inserting data: " . $conn->error;
  }
}

$search = $_GET['search'] ?? '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tablets Online Tutoring and Coaching Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e4d7;
            color: #5d3a3a;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #50a3a2;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077187 1px solid;
        }
        header h1 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        .content {
            display: flex;
            justify-content: space-between;
        }
        .content .sidebar {
            width: 30%;
            background: #f0e4d7;
            padding: 20px;
        }
        .content .main {
            width: 70%;
            background: #ffffff;
            padding: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            padding: 20px;
            color: #ffffff;
            background-color: #50a3a2;
        }
    </style>
</head>
<body>
    <header>
        <h1>Tablets Online Tutoring and Coaching Service</h1>
    </header>

    <div class="container">
        <div class="sidebar">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Search comments" value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="main">
            <?php
            if ($search) {
                $stmt = $conn->prepare("SELECT * FROM comments WHERE comment LIKE CONCAT('%',?,'%')");
                $stmt->bind_param("s", $search);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
                    }
                } else {
                    echo "<p>No comments found.</p>";
                }
            } else {
                echo "<p>Type something to search in comments.</p>";
            }
            ?>
        </div>
    </div>

    <div class="footer">
        © 2023 Tablets Online Tutoring and Coaching Service
    </div>
</body>
</html>
<?php
$conn->close();
?>

<?php

$host = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Connect to database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$tables = [
    'CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );',
    'CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );',
    'CREATE TABLE IF NOT EXISTS uploads (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255),
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );'
];

foreach ($tables as $query) {
    if (!$conn->query($query)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_file'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["csv_file"]["name"]);
    
    if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["csv_file"]["name"])) . " has been uploaded.";

        if (($open = fopen($target_file, "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $sql = "INSERT INTO uploads (filename) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", basename($_FILES["csv_file"]["name"]));
                $stmt->execute();
            }

            fclose($open);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedding Photography Showcase Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .upload-form {
            margin-top: 20px;
        }

        input[type=file], input[type=submit] {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Upload CSV File</h1>
    <p>Upload a CSV file to showcase bedding photography.</p>

    <form class="upload-form" action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="csv_file" id="csv_file">
        <input type="submit" value="Upload" name="submit">
    </form>
</div>

</body>
</html>