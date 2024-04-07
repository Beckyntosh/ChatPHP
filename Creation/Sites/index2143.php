<?php
// Index.php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$userId = 1; // Default user ID for demonstration
$theme = "light"; // Default theme
$layout = "standard"; // Default layout

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $theme = $_POST["theme"];
    $layout = $_POST["layout"];
  
    $sql = "INSERT INTO UserPreferences (userId, theme, layout) VALUES ($userId, '$theme', '$layout')
            ON DUPLICATE KEY UPDATE theme='$theme', layout='$layout'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated/inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT theme, layout FROM UserPreferences WHERE userId = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $theme = $row["theme"];
            $layout = $row["layout"];
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Preferences</title>
  <style>
    body.dark {
      background-color: #333;
      color: white;
    }
    body.light {
      background-color: #FFF;
      color: black;
    }
    .content.standard {
      max-width: 800px;
      margin: auto;
    }
    .content.wide {
      max-width: 1200px;
      margin: auto;
    }
  </style>
</head>
<body class="<?php echo $theme; ?>">
  <div class="content <?php echo $layout; ?>">
    <h1>Customize Your Experience</h1>
    <form action="" method="post">
      <label for="theme">Select theme:</label>
      <select name="theme" id="theme">
        <option value="light" <?php echo $theme == "light" ? "selected" : ""; ?>>Light</option>
        <option value="dark" <?php echo $theme == "dark" ? "selected" : ""; ?>>Dark</option>
      </select><br>
      <label for="layout">Select layout:</label>
      <select name="layout" id="layout">
        <option value="standard" <?php echo $layout == "standard" ? "selected" : ""; ?>>Standard</option>
        <option value="wide" <?php echo $layout == "wide" ? "selected" : ""; ?>>Wide</option>
      </select><br>
      <input type="submit" value="Save Preferences">
    </form>
  </div>
</body>
</html>

-- SQL to create the UserPreferences table
CREATE TABLE UserPreferences (
    userId INT PRIMARY KEY,
    theme VARCHAR(50),
    layout VARCHAR(50)
);
