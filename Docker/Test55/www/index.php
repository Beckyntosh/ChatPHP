// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Wines Style: detailed
<?php
// Simple Customizable User Dashboard for a Wines Website

// Database credentials
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logging in for the first time
// Assuming there's a `users` table with `username`, `password`, and `first_login` columns
session_start();
$username = $_SESSION['username'] ?? ''; // Username should be set on login
$userCheckQuery = "SELECT first_login FROM users WHERE username='$username'";
$userResult = $conn->query($userCheckQuery);

if ($userResult->num_rows > 0) {
    $row = $userResult->fetch_assoc();
    if ($row['first_login'] == 1) {
        // User is logging in for the first time

        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process form data
            // Assuming there's a `dashboard_layouts` table with `username`, `layout`, `widgets` columns
            $layout = $_POST['layout'];
            $widgets = implode(',', $_POST['widgets']); // Convert array to comma-separated string
            $updateQuery = "INSERT INTO dashboard_layouts (username, layout, widgets) VALUES ('$username', '$layout', '$widgets') ON DUPLICATE KEY UPDATE layout='$layout', widgets='$widgets'";
            
            if ($conn->query($updateQuery) === TRUE) {
                // Successfully updated the user's dashboard preferences
                // Update `first_login` in `users` table
                $conn->query("UPDATE users SET first_login=0 WHERE username='$username'");
                
                // Redirect to dashboard page (not provided here)
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Error: " . $updateQuery . "<br>" . $conn->error;
            }
        } else {
            // Show customization form
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Customize Your Dashboard</title>
            </head>
            <body>
                <h2>Customize Your Dashboard</h2>
                <form method="post">
                    <label for="layout">Choose a layout:</label>
                    <select id="layout" name="layout">
                        <option value="grid">Grid</option>
                        <option value="list">List</option>
                    </select><br><br>
                    <label>Select widgets:</label><br>
                    <input type="checkbox" name="widgets[]" value="latestWines"> Latest Wines<br>
                    <input type="checkbox" name="widgets[]" value="topRatings"> Top Ratings<br>
                    <input type="checkbox" name="widgets[]" value="wineNews"> Wine News<br><br>
                    <input type="submit" value="Save">
                </form>
            </body>
            </html>
            <?php
        }
    } else {
        // Not the first login, redirect to dashboard
        header("Location: dashboard.php");
        exit();
    }
} else {
    // User not found or not logged in
    echo "User not found or not logged in.";
}

$conn->close();
?>
