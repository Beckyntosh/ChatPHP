// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Sunglasses Style: Alan Turing

<?php
// Database connection
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

// Check if user table exists, if not, create it
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    dashboard_layout TEXT,
    first_login BOOLEAN DEFAULT true,
    reg_date TIMESTAMP
)";

if (!$conn->query($userTable) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if widgets table exists, if not, create it
$widgetsTable = "CREATE TABLE IF NOT EXISTS widgets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
)";

if (!$conn->query($widgetsTable) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handling user's first login
// This part should be tied to your authentication system. For demonstration, using a fixed user ID.
$userId = 1; // Example user ID

// Check if it's user's first login
$checkFirstLogin = "SELECT first_login FROM users WHERE id = $userId";
$result = $conn->query($checkFirstLogin);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["first_login"]) {
        // It's first login, redirect to customization page
        header("Location: customize_dashboard.php");
        exit();
    }
}

// User Dashboard Customization (Should be in separate file, e.g., customize_dashboard.php)
// Assuming this part is handled in customize_dashboard.php

// HTML + PHP for frontend customization page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customize Your Dashboard</title>
    <style>
        body { font-family: 'Alan Turing-style', sans-serif; }
        .widget { margin-bottom: 20px; }
        input[type=checkbox] { margin-right: 10px; }
        button { padding: 10px 20px; background-color: #000; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Customize Your Dashboard</h2>
    <form action="save_dashboard.php" method="post">
        <?php
        // Fetch available widgets to display for customization
        $sql = "SELECT id, name FROM widgets";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="widget"><input type="checkbox" name="widgets[]" value="' . $row["id"] . '">' . $row["name"] . '</div>';
            }
        } else {
            echo "No widgets available";
        }
        ?>
        <button type="submit">Save Dashboard</button>
    </form>
</body>
</html>

<?php
// Saving customized dashboard (Should be in another separate file, e.g., save_dashboard.php)

// Handling form submission and saving selected widgets to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedWidgets = $_POST['widgets'];
    $dashboardLayout = implode(",", $selectedWidgets); // Simple string format, can be JSON for complex structures

    // Update user's dashboard layout
    $updateLayout = "UPDATE users SET dashboard_layout='$dashboardLayout', first_login=false WHERE id=$userId";

    if ($conn->query($updateLayout) === TRUE) {
        echo "Dashboard customized successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
