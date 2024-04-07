<?php

* Connect to database */
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

// Table for languages might not exist, let's create it
$createTable = "CREATE TABLE IF NOT EXISTS languages (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(3) NOT NULL,
  language VARCHAR(30) NOT NULL,
  UNIQUE KEY unique_lang (code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if (!$conn->query($createTable)) {
  echo "Error creating table: " . $conn->error;
}

// Inserting the languages if they're not present
$checkLanguages = "SELECT * FROM languages";
$result = $conn->query($checkLanguages);

if ($result->num_rows < 1) {
  $sql = "INSERT INTO languages (code, language) VALUES ('en', 'English'), ('es', 'Spanish');";
  if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Detect user selection
$selectedLang = 'en'; // default
if(isset($_POST['language'])) {
  $selectedLang = $_POST['language'];
}

// Fetching welcome message
$query = $conn->prepare("SELECT language FROM languages WHERE code=? LIMIT 1");
$query->bind_param("s", $selectedLang); // 's' specifies the variable type => 'string'

$query->execute();

$result = $query->get_result();
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $userLang = $row["language"];
  }
} else {
  $userLang = "Language not supported yet!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sporting Goods Website</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            margin: auto;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        select {
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
        }

        button {
            padding: 10px;
            width: 100%;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <select name="language" onchange="this.form.submit()">
            <option value="en" <?php if($selectedLang == 'en'){echo 'selected';} ?>>English</option>
            <option value="es" <?php if($selectedLang == 'es'){echo 'selected';} ?>>Spanish</option>
        </select>
    </form>
    <p><?php echo "Selected Language: ".$userLang; ?></p>
</div>
</body>
</html>
