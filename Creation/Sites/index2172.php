<?php
// Connect to the database
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

$sql = "CREATE TABLE IF NOT EXISTS languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_code VARCHAR(5) NOT NULL,
language_name VARCHAR(50) NOT NULL,
UNIQUE (language_code)
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO languages (language_code, language_name) VALUES
('en', 'English'),
('es', 'Spanish')
ON DUPLICATE KEY UPDATE language_code=language_code;";

if ($conn->query($sql) !== TRUE) {
  echo "Error inserting languages: " . $conn->error;
}

function getCurrentLanguage($conn) {
  if(isset($_COOKIE['current_language'])) {
    $current_language = $_COOKIE['current_language'];
  } else {
    $current_language = 'en'; // Default language
    setcookie('current_language', $current_language, time() + (86400 * 30), "/"); // 86400 = 1 day
  }
  
  $sql = "SELECT language_code, language_name FROM languages WHERE language_code = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $current_language);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if($result->num_rows > 0) {
    return $result->fetch_assoc();
  } else {
    return null;
  }
}

if(isset($_GET['language'])) {
  $language = $_GET['language'];
  setcookie('current_language', $language, time() + (86400 * 30), "/"); // 86400 = 1 day
  header("Location: ".$SERVER['PHP_SELF']);
}

$currentLanguage = getCurrentLanguage($conn);
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLanguage['language_code']; ?>">
<head>
<meta charset="UTF-8">
<title>Wine Selection</title>
</head>
<body>

<h1><?php echo $currentLanguage['language_code'] == 'es' ? 'Selección de Vino' : 'Wine Selection'; ?></h1>

<form action="" method="get">
  <label for="language"><?php echo $currentLanguage['language_code'] == 'es' ? 'Selecciona tu idioma' : 'Select your language'; ?>:</label>
  <select name="language" id="language" onchange="this.form.submit()">
    <?php
    $sql = "SELECT * FROM languages";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value='". $row['language_code'] ."' ". ($currentLanguage['language_code'] == $row['language_code'] ? 'selected' : '') .">". $row['language_name'] ."</option>";
      }
    }
    ?>
  </select>
</form>
    
</body>
</html>
<?php $conn->close(); ?>
