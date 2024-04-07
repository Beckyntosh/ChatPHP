<?php
$host = "db";
$db = "my_database";
$password="root";
$user="root";

// Create connection
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["licenseFile"]["name"]);
    if (move_uploaded_file($_FILES["licenseFile"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO users (license) VALUES ('".$target_file."')";
        if ($conn->query($sql) === TRUE) {
            echo "File Uploaded successfully.";
        } else {
           echo "Error uploading file.";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $productId = $_POST["productId"];
    $review_text = $_POST["text"];
    
    $sql = "INSERT INTO reviews (name, text, productId) VALUES ('{$name}', '{$review_text}', {$productId})";

    if ($conn->query($sql) === TRUE) {
        echo "Review created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>School Supplies Carrier</title>
   <style>
      body {
         background-color: #FF7F50;
         font-family: Arial, sans-serif;
      }
      form {
         margin-top: 50px;
         text-align: center;
      }
   </style>
</head>
<body>
   <form method="post" enctype="multipart/form-data">
        <input type="file" name="licenseFile" id="licenseFile"><br><br>
        <button type="submit" value="Upload License" name="submit">Upload License</button>
   </form>
</body>
</html>

<?php
$dbname = "my_database";
$user = "root";
$pass = "root";
$host= "db";
$dsn = sprintf('mysql:host=%s;dbname=%s', $host, $dbname );
$pdo = new PDO($dsn, $user, $pass);

$search = '%'.$_POST['search'].'%';

$sql = "SELECT * FROM albums WHERE name LIKE ?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$search]);

echo '<!DOCTYPE html>
<html>
<head>
   <title>School Supplies Carrier</title>
   <style>
      body {
         background-color: #FF7F50;
         font-family: Arial, sans-serif;
      }
      form {
         margin-top: 50px;
         text-align: center;
      }
   </style>
</head>
<body>
   <form method="post">
        <input type="text" name="search" required>
        <input type="submit" value="Search Albums">
   </form>
</body>
</html>';
?>
