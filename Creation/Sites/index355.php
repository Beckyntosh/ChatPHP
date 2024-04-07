<?php
// Establish connection to the database
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

// Handle language change request
if(isset($_POST['language'])){
    $language = $_POST['language'];

    // Validate and sanitize the language input
    $allowedLanguages = ['en', 'es'];
    if(in_array($language, $allowedLanguages)) {
        setcookie("selectedLanguage", $language, time() + (86400 * 30), "/"); // 86400 = 1 day
    } else {
        $language = 'en'; // default language
    }
} 
else {
    $language = isset($_COOKIE['selectedLanguage']) ? $_COOKIE['selectedLanguage'] : 'en';
}

// Load the language file based on the selection
$lang = [];
if(file_exists("languages/{$language}.php")) {
    include "languages/{$language}.php";
} else {
    // fallback to English if the selected language file does not exist
    include "languages/en.php";
}

?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($language); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lang['PAGE_TITLE']; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #ffe5b4;
            color: #2d2d2d;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        select {
            font-size: 16px;
            padding: 5px;
        }

        button {
            cursor: pointer;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            margin-top: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <label for="language-select"><?php echo $lang['SELECT_LANGUAGE']; ?>:</label>
        <select name="language" id="language-select">
            <option value="en" <?php echo $language === 'en' ? 'selected' : ''; ?>>English</option>
            <option value="es" <?php echo $language === 'es' ? 'selected' : ''; ?>>Español</option>
        </select>
        <button type="submit"><?php echo $lang['SAVE']; ?></button>
    </form>

    <h1><?php echo $lang['WELCOME_MESSAGE']; ?></h1>
    <p><?php echo $lang['WELCOME_DESCRIPTION']; ?></p>
</div>
</body>
</html>