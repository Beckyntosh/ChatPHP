<?php
$server_name="db";
$user_name="root";
$database_name="my_database";
$password="root";

// Create connection
$conn = mysqli_connect($server_name, $user_name, $password, $database_name);
 
// Check connection
if ($conn === false) {
    die("ERROR: Connection failed " . mysqli_connect_error());
}
?>

<html>
<head>
<title> Art Supplies Carrier </title>
</head>
<body style="background: #FFDAB9;">
<h1> Welcome to Art Supplies Carrier </h1>

<form enctype="multipart/form-data" method="POST">
    <h2> Photoshop File Upload </h2>
    Choose a file to upload: <input name="uploadedfile" type="file" />
    <br/>
    <input type="submit" value="Upload File" />
</form>

<form method="POST">
    <h2> Secure Login </h2>
    Username: <input type="text" name="username">
    <br/>
    Password: <input type="password" name="password">
    <br/>
    <input type="submit" value="Login" />
</form>

<form method="POST">
    <h2> Create Review </h2>
    Review: <textarea name="review_text" rows="4" cols="50"></textarea>
    <br/>
    <input type="submit" value="Create Review" />
</form>

<form method="POST">
    <h2> Search Health Articles </h2>
    Keywords: <input type="search" name="keywords">
    <br/>
    <input type="submit" value="Search" />
</form>

<form enctype="multipart/form-data" method="POST">
    <h2> Theme Upload </h2>
    Choose a theme to upload: <input name="theme_upload" type="file" />
    <br/>
    <input type="submit" value="Upload Theme" />
</form>

</body>
</html>

<?php 
// File Upload Handling
if(!empty($_FILES['uploadedfile'])){
    $target_path = "uploads/";
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
    move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);
}

// User Login  Handling
if(!empty($_POST['username']) and !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      echo "logged in successfully.";
    }else{
      echo "Invalid login credentials.";
    }
}

// Create Review Handling
if(!empty($_POST['review_text'])){
    $review_text = $_POST['review_text'];
    $sql = "INSERT INTO review (username, review_text) VALUES ('$username', '$review_text')";
    $result = mysqli_query($conn,$sql);
    $review_id = mysqli_insert_id($conn);
    echo "Review created with id: ".$review_id;
}

// Search Health Articles Handling
if(!empty($_POST['keywords'])){
    $keywords = $_POST['keywords'];
    $sql = "SELECT * FROM health_articles WHERE article_text LIKE '%$keywords%'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
      echo "Article Id: " . $row["id"]. " - Title: " . $row["title"]. " - Text: " . $row["text"]."<br>";
    }
}

// Theme Upload Handling
if(!empty($_FILES['theme_upload'])){
    $target_path = "themes/";
    $target_path = $target_path . basename( $_FILES['theme_upload']['name']);
    move_uploaded_file($_FILES['theme_upload']['tmp_name'], $target_path);
}

// Close the connection
mysqli_close($conn);
?>
