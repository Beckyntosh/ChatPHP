<?php
// Database connection
$dbhost = 'db';
$dbuser = 'root';
$dbpass = 'root';
$db = 'my_database';
$dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if($dbconn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Add to favorites
if(isset($_POST['favorite'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    
    $sql = "INSERT INTO favorites (user_id, product_id) VALUES ('$user_id', '$product_id')";

    if(mysqli_query($dbconn, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute query. " . mysqli_error($dbconn);
    }
}

// html Headers
echo '<!DOCTYPE html><html><head>';
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">';
echo '<title>Gardening Tools Automobile Sales and Review Site</title>';
echo '</head><body>';

// Body
echo '<div class="container">';

// Users and products query
$sql = "SELECT users.id as user_id, users.name as user_name, products.id as product_id, products.name as product_name FROM users, products";
$result = mysqli_query($dbconn, $sql);

if(mysqli_num_rows($result) > 0){
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Username: " . $row["user_name"]. " | Product: " . $row["product_name"]. " | ";
        // Add to favorite form
        echo '<form method="post" action="add_fav.php">';
        echo '<input type="hidden" name="user_id" value="'.$row["user_id"].'">';
        echo '<input type="hidden" name="product_id" value="'.$row["product_id"].'">';
        echo '<input type="submit" name="favorite" value="Add to Favorites">';
        echo '</form>';
    }
} else {
    echo "0 results";
}

echo '</div>';

// html end
echo '</body></html>';

// Close connection
mysqli_close($dbconn);
?>