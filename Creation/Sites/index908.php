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

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    
    // Insert poll response into database
    $sql = "INSERT INTO poll_responses (user_id, product_id) VALUES ('$user_id', '$product_id')";
    $conn->query($sql);
    
}

// Get poll options from products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$options = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options[] = $row;
    }
} 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tropical Paradise Perfume Poll</title>
        <style>
            body {
                background-color: #f5f5dc;
                font-family: Arial, sans-serif;
            }
            form {
                margin-top: 20px;
            }
            h1 {
                color: #008080;
            }
            p {
                color: #006400;
            }
        </style>
    </head>
    <body>
        <h1>Welcome to the Tropical Paradise Perfume Poll!</h1>
        <p>Please choose your favourite fragrance:</p>
        <form method="post" action="poll.php">
            <?php foreach ($options as $option):?>
            <p>
                <input type="radio" name="product_id" value="<?php echo $option['id']; ?>"> <?php echo $option['name']; ?>
            </p>
            <?php endforeach?>
            <input type="hidden" name="user_id" value="1">
            <input type="submit" name="submit" value="Submit">
        </form>

        <h1>Adventure Awaits Quiz</h1>
        <?php 
        $sql = "SELECT question, option_a, option_b, option_c, option_d, correct_answer FROM quiz";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<form method="post" action="/submit_quiz.php">
                    <h3>'. $row["question"].'</h3>
                    <input type="radio" name="answer" value="a">'. $row["option_a"].'<br>
                    <input type="radio" name="answer" value="b">'. $row["option_b"].'<br>
                    <input type="radio" name="answer" value="c">'. $row["option_c"].'<br>
                    <input type="radio" name="answer" value="d">'. $row["option_d"].'<br>
                    <input type="submit" name="submit_answer" value="Submit Answer"></form>';
            }
        } else {
            echo "No questions available";
        }
        ?>

        <h1>Change Password</h1>
        <div class="container">
            <form action="" method="post">
                <input type="hidden" id="id" name="id">
                <label for="new_password">New Password:</label><br>
                <input type="password" id="new_password" name="new_password"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
        
        <h1>Retro Revival Sunglasses Store</h1>
        <?php
        $search = $_POST['search'];
        $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
        $result = $conn->query($sql);
        
        echo "<table>";
        echo "<tr><th>Product Name</th><th>Description</th><th>Price</th><th>Video URL</th></tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["product_name"]. "</td><td>". $row["description"]. "</td><td>" . $row["price"]. "</td><td>". "<a href='". $row["video_url"]. "'>Watch Video</a>". "</td></tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        ?>

    </body>
</html>
<?php
$conn->close();
?>
<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

echo "<html>
<style>
body {
    background-color: #f5f5f5;
    font-family: 'Urbanist', sans-serif;
    color: #333;
}
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 10px;
}
</style>
<body>
<div class='container'>
   <h1>Smartphone App Upload</h1>
   <form method='POST' action='' enctype='multipart/form-data'>
      <input type='file' name='file'>
      <input type='submit' name='upload' value='Upload'>
   </form>
</div>
</body>
</html>
";

if(isset($_POST["upload"])){

    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $folder = "uploads/";

    if(move_uploaded_file($temp_name, $folder.$file_name)){
        echo $file_name." Uploaded Successfully.<br>";

        // insert file info into database
        try {
            $stmt = $pdo->prepare("INSERT INTO products (product_name) VALUES (:product_name)");
            $stmt->execute(['product_name' => $file_name]);

            echo "File info saved to database.<br>";

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }else{
        echo "File Upload Failed!";
    }
}
?>
?>