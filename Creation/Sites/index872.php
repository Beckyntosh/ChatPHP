<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function enrollCourse($conn, $user_id, $product_id){
  $sql = "INSERT INTO enrolment (user_id, product_id) VALUES ($user_id, $product_id)";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
    </style>
  </head>
  <body>
    <h1>Clothing News - Enroll in Course</h1>
  </body>
</html>

<?php
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit']) && $_POST['submit'] == 'Register') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $insert_query = "INSERT INTO users (username, name, email, password) VALUES ('user3', '$name', '$email', '$hashed_password')";
    $result = mysqli_query($conn, $insert_query);
    if($result) {
        echo "User registered successfully";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search_keyword = $_POST["search"];
    $sql = "SELECT id, title, category FROM articles WHERE title LIKE '%$search_keyword%' OR category LIKE '%$search_keyword%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["category"]. "</p>";
        }
    } else {
        echo "<p>No results found!</p>";
    }
}
?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <input type="submit" value="Register" name="submit">
</form>

<h2>Beach Themed Desktop Computers Blog</h2>
<form method="post">
    <input type="text" name="search" placeholder="Search how-to articles">
    <input type="submit" value="Search">
</form>

<h1>Upcoming Events!</h1>
<?php
$sql = "SELECT id, title, description, date, location FROM events";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"]. "</h2><p>" . $row["description"]. "</p><p>Date: " . $row["date"]. "</p><p>Location: " . $row["location"]. "</p>";
    }
} else {
    echo "No upcoming events";
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: springgreen;
        }
    </style>
    <title>Upload Plugins</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Please select plugin to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Plugin" name="submit">
    </form>
</body>
</html>

<?php
$target_dir = "plugins/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"]) && $_POST["submit"] == 'Upload Plugin') {
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
