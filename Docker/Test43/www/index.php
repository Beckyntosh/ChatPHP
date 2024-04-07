// PARAMETERS: Function: Volunteer Sign-up Platform for Events and Causes: create an example signup platform for volunteering at events and social causes. Example: User registers to volunteer at a local charity event Product: Bicycles Style: asynchronous
<?php
// Set up database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for volunteer sign-ups if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS VolunteerSignUps (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    event VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table successfully created or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle post request for new sign-up
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $event = $_POST['event'];

    $stmt = $conn->prepare("INSERT INTO VolunteerSignUps (fullname, email, event) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $event);
    
    if ($stmt->execute() === TRUE) {
        $signupSuccess = true;
    } else {
        $signupSuccess = false;
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Sign-up</title>
</head>
<body>
    <h2>Sign up to Volunteer</h2>
    <form action="" method="post" id="volunteerForm">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="event">Event:</label><br>
        <select id="event" name="event">
            <option value="Local Charity Biking Event">Local Charity Biking Event</option>
            <option value="Community Bike Repair Workshop">Community Bike Repair Workshop</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($signupSuccess) && $signupSuccess) {
        echo "<p>Thanks for signing up!</p>";
    } elseif (isset($signupSuccess) && !$signupSuccess) {
        echo "<p>There was an issue with your sign-up. Please try again later.</p>";
    }
    ?>
    <script>
        document.getElementById('volunteerForm').onsubmit = async function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let response = await fetch('', {
              method: 'POST',
              body: formData
            });
            if (response.ok) {
              let result = await response.text();
              document.body.innerHTML = result;
            } else {
              alert('Sign up error.');
            }
        };
    </script>
</body>
</html>
