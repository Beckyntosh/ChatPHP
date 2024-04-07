// PARAMETERS: Function: Language Preference Selection during Signup: create an example feature for language preference selection during signup. Example: User selects their preferred interface language during account creation Product: Fitness Equipment Style: rigorous
<?php
// Connection variables
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

// Execute when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // simple hash for password, consider using password_hash in production
    $language = $_POST['language'];

    // SQL to insert new user
    $sql = "INSERT INTO users (username, email, password, language) VALUES ('$username', '$email', '$password', '$language')";

    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// HTML and PHP mixed for simplicity
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup with Language Preference</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" required>
  <br><br>
  E-mail: <input type="email" name="email" required>
  <br><br>
  Password: <input type="password" name="password" required>
  <br><br>
  Preferred Language:
  <select name="language" required>
    <option value="English">English</option>
    <option value="French">French</option>
    <option value="Spanish">Spanish</option>
    <option value="German">German</option>
  </select>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>

<?php
$conn->close();
?>
