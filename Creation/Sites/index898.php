<?php
// Database configuration
$dbhost = 'db';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'my_database';
$dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if($dbconn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Add to favorites
if(isset($_POST['favorite'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    
    $sql = "INSERT INTO favorites (user_id, product_id) VALUES ('$user_id', '$product_id')";

    if(mysqli_query($dbconn, $sql)){
        echo "Records added successfully.<br>";
    } else{
        echo "ERROR: Could not able to execute query. " . mysqli_error($dbconn);
    }
}

// Save contact form data
if(isset($_POST['save'])){
    $sql = "INSERT INTO users (name, email, address, phone) VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["address"]."','".$_POST["phone"]."')";

    if(mysqli_query($dbconn, $sql)) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbconn);
    }
}

// HTML Headers
echo '<!DOCTYPE html><html><head>';
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">';
echo '<title>Multipurpose Site</title>';
echo '<style>
        body{ font-family: Arial; background-color: #aff0b2; color: #333; }
        .container { background-color: #fff; padding: 20px; margin-top: 20px; }
        .upload-form { padding: 20px; }
      </style>';
echo '</head><body>';

// Users and products query
$sql = "SELECT users.id as user_id, users.name as user_name, products.id as product_id, products.name as product_name FROM users, products";
$result = mysqli_query($dbconn, $sql);

echo '<div class="container">';

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        echo "Username: " . $row["user_name"]. " | Product: " . $row["product_name"]. " | ";
        echo '<form method="post">';
        echo '<input type="hidden" name="user_id" value="'.$row["user_id"].'">';
        echo '<input type="hidden" name="product_id" value="'.$row["product_id"].'">';
        echo '<input type="submit" name="favorite" value="Add to Favorites">';
        echo '</form>';
    }
} else {
    echo "0 results";
}

echo '</div>';

// Contact form
echo '<div class="container">';
echo '<form method="post">
      Full Name:<br>
      <input type="text" name="name" required><br>
      Email:<br>
      <input type="email" name="email" required><br>
      Street Address:<br>
      <input type="text" name="address" required><br>
      Phone:<br>
      <input type="tel" name="phone" required><br>
      <input type="submit" name="save" value="Save Contact">
    </form>';
echo '</div>';

mysqli_close($dbconn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Podcast Upload Form</title>
    <style>
        .upload-container {
            width: 50%; margin: auto; margin-top: 20px; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 { color: #333; text-align: center; }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2>Upload Your Podcast</h2>
        <form action="" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input type="file" name="podcastFile" id="podcastFile">
            <input type="submit" value="Upload Podcast" name="submit">
        </form>
    </div>
</body>
</html>
