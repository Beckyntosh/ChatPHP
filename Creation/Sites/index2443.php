<?php
// Initialize a session
session_start();

// If form submitted, insert values into the database.
if (isset($_POST['username'])) {
    // Database credentials
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

    // Escapes special characters in a string for use in an SQL statement
    $user_name = stripslashes($_POST['username']);
    $user_name = mysqli_real_escape_string($conn, $user_name);
    $user_email = stripslashes($_POST['email']);
    $user_email = mysqli_real_escape_string($conn, $user_email);
    $user_password = stripslashes($_POST['password']);
    $user_password = mysqli_real_escape_string($conn, $user_password);

    $query = "INSERT into `users` (username, password, email)
              VALUES ('$user_name', '" . md5($user_password) . "', '$user_email')";
    $result = $conn->query($query);

    if ($result) {
        $_SESSION['username'] = $user_name;
        header("Location: welcome.php"); // Redirect user to welcome.php
    } else {
        echo "<div class='form'>
                <h3>Registration failed.</h3>
                <br/>Click here to <a href='registration.php'>register</a>
              </div>";
    }
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Registration - Customizable News Feed</title>
    </head>
    
    <body>
    <div class="form">
        <h1>Register for a customized news feed</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>
        <p>Already registered? <a href='login.php'>Log In</a></p>
    </div>
    </body>
    </html>
    <?php
}
?>
