// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Books Style: lively
<?php
// Check if the user is making a post request to customize their dashboard
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection info
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

    // Retrieve user inputs
    $userId = htmlspecialchars($_POST['userId']);
    $layout = htmlspecialchars($_POST['layout']);
    $widgets = isset($_POST['widgets']) ? json_encode($_POST['widgets']) : '';

    // Check if user settings already exist
    $checkSql = "SELECT user_id FROM user_dashboard WHERE user_id = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->fetch_assoc()) {
        // Update existing user dashboard settings
        $updateSql = "UPDATE user_dashboard SET layout = ?, widgets = ? WHERE user_id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("sss", $layout, $widgets, $userId);
    } else {
        // Insert new user dashboard settings
        $insertSql = "INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("sss", $userId, $layout, $widgets);
    }

    if ($stmt->execute()) {
        echo "Your dashboard has been customized successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customizable User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
            padding: 20px;
        }
        .dashboard-config {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        label {
            margin-top: 10px;
        }
        input, select, button {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="dashboard-config">
        <h2>Customize Your Dashboard</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
Assume a user ID of 1 for demonstration
            <label for="layout">Choose your dashboard layout:</label>
            <select name="layout" id="layout" required>
                <option value="classic">Classic</option>
                <option value="modern">Modern</option>
                <option value="compact">Compact</option>
            </select>
            <br>
            <label>Choose your widgets:</label>
            <br>
            <input type="checkbox" id="widget1" name="widgets[]" value="latest_books">
            <label for="widget1">Latest Books</label><br>
            <input type="checkbox" id="widget2" name="widgets[]" value="book_recommendations">
            <label for="widget2">Book Recommendations</label><br>
            <input type="checkbox" id="widget3" name="widgets[]" value="favorite_authors">
            <label for="widget3">Favorite Authors</label><br>
            <button type="submit">Customize Dashboard</button>
        </form>
    </div>
</body>
</html>
Note: This code assumes you have pre-existing user and `user_dashboard` table schemas in your database with appropriate fields (`user_id`, `layout`, `widgets`) for storing the dashboard configuration. Also, it operates under the assumption that a user ID is tied to the request; as such, security measures such as user authentication and input validation are recommended but beyond the scope of this code snippet for simplicity.