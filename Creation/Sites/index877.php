
<?php
$host = "db";
$username = "root";
$password = "root";
$database = "my_database";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "CREATE TABLE IF NOT EXISTS users(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    username VARCHAR(50),
    password VARCHAR(100)
)";

if ($conn->query($query) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "INSERT INTO users (firstname, lastname, email, username, password) VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";
    $conn->query($query);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop - Create Profile</title>
    <style>
        body { background-color: red; color: white; }
    </style>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Firstname: <input type="text" name="firstname"><br>
        Lastname: <input type="text" name="lastname"><br>
        Email: <input type="text" name="email"><br>
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="register" value="Create Profile">
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

if(isset($_POST['upload'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if ($fileSize < 500000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.php?uploadsuccess");
            } else {
                echo "Your file is too big";
            }
        } else {
            echo "There was an error uploading your file";
        }
    } else {
        echo "You cannot upload files of this type";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        h2 {
            margin: 30px;
        }
        .container {
            width: 40%;
            margin: auto;
            padding: 20px;
        }

        #submit {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Beauty Product Upload Page</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="upload" id="submit">UPLOAD</button>
    </form>
</div>

</body>
</html>
<?php
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
 die('Connection failed: ' . $conn->connect_error);
}
// Below codes will create two tables named "users" and "products"
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role VARCHAR(20),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Users created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    product_description VARCHAR(255),
    product_price FLOAT(6,2),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Products created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<html>
<head>
    <title>Modern Metropolis Children's Clothing and Interior Design</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
  <h1>Welcome to Modern Metropolis Children's Clothing and Interior Design Site!</h1>
Add here your HTML content or code for role management
</body>
</html>

<?php
$servername = "db";
$username = "root";
$password = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$search_query = $_POST['search'];

$sql = "SELECT * FROM products WHERE product_name LIKE '%$search_query%'";
$result = $conn->query($sql);

echo "<h1>Tropical Paradise Books</h1>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Book Name: " . $row["product_name"]. " - Author: " . $row["product_description"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<html>
<head>
<title>Tropical Paradise Books - Search Functionality</title>
<style>
body {
  background-image: url('tropical-paradise.jpg');
  color: #000;
}
</style>
</head>
<body>
<form method="post" action="">
  <input type="text" name="search" placeholder="Search for books.." required>
  <input type="submit" value="Search">
</form>
</body>
</html>

<?php
$host = "db";
$db = "my_database";
$user = "root";
$pass = "root";
$conn = new PDO("mysql:host=$host; dbname=$db", $user, $pass);

if($_POST){
    $name = $_FILES['myfile']['name'];
    $type = $_FILES['myfile']['type'];
    $data = file_get_contents($_FILES['myfile']['tmp_name']);
    $stmt = $conn->prepare("insert into users values('', :name, :type, :data)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':data', $data);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sunglasses Carrier Site</title>
    <style>
        body {
            background-color: #ADD8E6;
            color: #00008B;
        }
        h1 {
            text-align: center;
            color: #000080;
        }
        .input-group {
            max-width: 300px;
            margin: auto;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>Resume Upload for Sunglasses Carrier Site</h1>
    <form method="POST" enctype="multipart/form-data" class="input-group">
        <input type="file" required name="myfile"><br>
        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html>
