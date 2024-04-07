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

// If language is set, store it in a cookie, else set default language to English
if (isset($_POST['language'])) {
    $language = $_POST['language'];
    setcookie('language', $language, time() + (86400 * 30), "/");
} else {
    if (isset($_COOKIE['language'])) {
        $language = $_COOKIE['language'];
    } else {
        $language = 'English';
    }
}

// Language strings
$translations = array(
    'English' => array(
        'title' => 'Welcome to Our Craft Beers Website',
        'desc' => 'Explore our diverse collection of medieval-style brews.'
    ),
    'Spanish' => array(
        'title' => 'Bienvenido a Nuestro Sitio Web de Cervezas Artesanales',
        'desc' => 'Explora nuestra diversa colección de brebajes al estilo medieval.'
    )
);

// HTML and PHP mixed
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $translations[$language]['title']; ?></title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #fdf1e0;
            color: #5a2a27;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #5a2a27;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        .language-select {
            float: right;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1><?php echo $translations[$language]['title']; ?></h1>
            <form action="" method="post" class="language-select">
                <select name="language" onchange="this.form.submit()">
                    <option value="English" <?php echo $language == 'English' ? 'selected' : ''; ?>>English</option>
                    <option value="Spanish" <?php echo $language == 'Spanish' ? 'selected' : ''; ?>>Spanish</option>
                </select>
            </form>
        </div>
    </header>
    <div class="container">
        <p><?php echo $translations[$language]['desc']; ?></p>
    </div>
</body>
</html>
<?php
$conn->close();
?>
