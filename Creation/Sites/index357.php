<?php
// Set up database connection
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

// Handle language selection
$selected_language = 'en'; // default language
if (isset($_GET['language'])) {
  $selected_language = $_GET['language']; // get the selected language from URL

  // store user preference in the database/session/cookie etc. Here we are simply using a session.
  session_start();
  $_SESSION['language'] = $selected_language;
} else {
  session_start();
  if (isset($_SESSION['language'])) {
    // if already set in the session, use that
    $selected_language = $_SESSION['language'];
  }
}

// Simple i18n support
$translations = [
  'en' => ['title' => 'Welcome to Our Handbags Store', 'welcome' => 'Find your perfect handbag!'],
  'es' => ['title' => 'Bienvenido a Nuestra Tienda de Bolsos', 'welcome' => '¡Encuentra el bolso perfecto!'],
];

// Select translation based on selected language
$trans = isset($translations[$selected_language]) ? $translations[$selected_language] : $translations['en'];
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($selected_language); ?>">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($trans['title']); ?></title>
</head>
<body>
  <header>
    <h1><?php echo htmlspecialchars($trans['welcome']); ?></h1>
    <nav>
      <ul>
        <li><a href="?language=en">English</a></li>
        <li><a href="?language=es">Español</a></li>
      </ul>
    </nav>
  </header>
  <main>
Content goes here
  </main>
</body>
</html>

<?php
$conn->close();
?>