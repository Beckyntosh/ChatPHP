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

// Create themes table if it does not exist
$themeTableSql = "CREATE TABLE IF NOT EXISTS themes (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
file_path VARCHAR(255)
);";
if (!$conn->query($themeTableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Function to handle file upload
function uploadTheme($conn) {
    $target_dir = "themes/";
    $target_file = $target_dir . basename($_FILES["themeFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["themeFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "css" ) {
        echo "Sorry, only CSS files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["themeFile"]["tmp_name"], $target_file)) {
            // Save file info in db
            $sql = "INSERT INTO themes (name, file_path) VALUES ('" . basename($_FILES["themeFile"]["name"]) . "', '" . $target_file . "')";
            
            if(mysqli_query($conn, $sql)){
                echo "The file ". htmlspecialchars(basename( $_FILES["themeFile"]["name"])). " has been uploaded.";
            } else{
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["themeFile"])) {
    uploadTheme($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Theme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
        }
        .container {
            width: 80%;
            margin: auto;
            text-align: center;
        }
        input[type=file], input[type=submit] {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Industrial Chic Sunglasses Site - Theme Upload</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select theme to upload:
        <input type="file" name="themeFile" id="themeFile">
        <input type="submit" value="Upload Theme" name="submit">
    </form>
</div>
</body>
</html>
<?php
$conn->close();
?>



<?php
// Database Configuration
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
$tablesSQL = file_get_contents("init.sql");
if (!$conn->multi_query($tablesSQL)) {
    echo "Error creating tables: " . $conn->error;
}

// Wait for multi_queries to finish
do {
    if ($res = $conn->store_result()) {
        $res->free();
    }
} while ($conn->more_results() && $conn->next_result());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic Foods Health and Fitness Tracking Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        header {
            text-align: center;
            margin-bottom: 40px;
        }
        .search-box {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-box input[type=text] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .search-box input[type=submit] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            background-color: #4CAF50;
            cursor: pointer;
        }
        .product {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
        .product:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Organic Foods Health & Fitness Tracking</h1>
        </header>
        <div class="search-box">
            <form action="" method="GET">
                <input type="text" name="q" placeholder="Search products...">
                <input type="submit" value="Search">
            </form>
        </div>
        <?php
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $searchTerm = $conn->real_escape_string($_GET['q']);
            $sql = "SELECT * FROM products WHERE name LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<div>" . $row["name"]. "</div><div>$" . $row["price"]. "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No products found matching your query.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>



<?php
// Connection vars
$host = 'db';
$db = 'my_database';
$user = 'root';
$pass = 'root';

// Connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check and create tables if not exists
$checkTablesSQL = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    description TEXT,
    ingredients TEXT,
    steps TEXT,
    image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
";
if (!$conn->multi_query($checkTablesSQL)) {
    echo "Error creating tables: " . $conn->error;
}

// Close the multi_query loop
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->next_result());

// Authentication check
session_start();
$loggedIn = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, name FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        $loggedIn = true;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Food and Recipe Sharing Site</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #fdf6e3;
            color: #586e75;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .login-form,
        .welcome-message {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Rustic Retreat Jewelry Food and Recipe Sharing Site</h1>
        <?php if (!$loggedIn): ?>
        <div class="login-form">
            <form action="" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" name="login" value="Login">
            </form>
        </div>
        <?php else: ?>
        <div class="welcome-message">
            <p>Welcome <?php echo htmlspecialchars($_SESSION['name']); ?>! You are logged in.</p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Summer Makeup Webshop</title>
  <style>
    body {
      background-color: #FFC300;
      font-family: Arial, sans-serif;
    }
    form {
      margin: 0 auto;
      width: 200px;
      padding: 1em;
      border: 1px solid #CCC;
      border-radius: 1em;
    }
  </style>
</head>
<body>
  <h2>Create Profile</h2>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <input type="submit">
  </form>

</body>
</html>

<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];

  $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $recipe_name = $_POST["recipeName"]; 
    $ingredients = $_POST["ingredients"]; 
    $method = $_POST["method"]; 

    $sql = "INSERT INTO recipes (recipe_name, ingredients, method) VALUES ('$recipe_name', '$ingredients', '$method')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mediterranean Marvel - Recipe Submission</title>
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    </style>
</head>
<body>

<h2>Recipe Submission</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  Recipe Name: <input type="text" name="recipeName">
  <br><br>
  Ingredients: <textarea name="ingredients" rows="5" cols="40"></textarea>
  <br><br>
  Method: <textarea name="method" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>

<?php
// Connection vars
$host = 'db';
$db = 'my_database';
$user = 'root';
$pass = 'root';

// Connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check and create tables if not exists
$checkTablesSQL = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    description TEXT,
    ingredients TEXT,
    steps TEXT,
    image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
";
if (!$conn->multi_query($checkTablesSQL)) {
    echo "Error creating tables: " . $conn->error;
}

// Close the multi_query loop
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->next_result());

// Authentication check
session_start();
$loggedIn = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, name FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        $loggedIn = true;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Food and Recipe Sharing Site</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #fdf6e3;
            color: #586e75;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .login-form,
        .welcome-message {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Rustic Retreat Jewelry Food and Recipe Sharing Site</h1>
        <?php if (!$loggedIn): ?>
        <div class="login-form">
            <form action="" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" name="login" value="Login">
            </form>
        </div>
        <?php else: ?>
        <div class="welcome-message">
            <p>Welcome <?php echo htmlspecialchars($_SESSION['name']); ?>! You are logged in.</p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>



<?php
// Database Configuration
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
$tablesSQL = file_get_contents("init.sql");
if (!$conn->multi_query($tablesSQL)) {
    echo "Error creating tables: " . $conn->error;
}

// Wait for multi_queries to finish
do {
    if ($res = $conn->store_result()) {
        $res->free();
    }
} while ($conn->more_results() && $conn->next_result());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=