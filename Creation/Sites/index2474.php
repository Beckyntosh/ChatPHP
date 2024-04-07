<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

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

// Define variables and initialize with empty values
$appointment_time = "";
$appointment_time_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["appointment_time"]))) {
        $appointment_time_err = "Please enter a time for your appointment.";
    } else {
        $appointment_time = trim($_POST["appointment_time"]);
    }

    // Check input errors before inserting in database
    if (empty($appointment_time_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO appointments (user_id, appointment_time) VALUES (?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("is", $param_user_id, $param_appointment_time);

            // Set parameters
            $param_user_id = $_SESSION["id"];
            $param_appointment_time = $appointment_time;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: welcome.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Book an Appointment</h2>
        <p>Please fill this form to book an appointment.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Appointment Time</label>
                <input type="datetime-local" name="appointment_time" class="form-control <?php echo (!empty($appointment_time_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $appointment_time; ?>">
                <span class="invalid-feedback"><?php echo $appointment_time_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
