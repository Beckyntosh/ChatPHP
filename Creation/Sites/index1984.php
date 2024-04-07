<?php
// Simple volunteer sign-up platform code in a single file. This is a very basic example and not secure for real-world usage. Consider using prepared statements and proper validation/sanitization for production environments.

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Insert the submitted form data into the database
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event = $_POST['event'];

    $sql = "INSERT INTO volunteers (name, email, event) VALUES ('$name', '$email', '$event')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for signing up as a volunteer!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Sign-up Platform</title>
</head>
<body>
    <h1>Sign Up to Volunteer at Local Charity Events</h1>
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="event">Select Event:</label><br>
        <select id="event" name="event">
            <option value="Charity Run">Charity Run</option>
            <option value="Food Drive">Food Drive</option>
            <option value="Book Donation">Book Donation</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
// You should create the 'volunteers' table in 'my_database' first before running the script
// SQL to create table

*
CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
*/
?>
