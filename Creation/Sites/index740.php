<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create FAQ table if it doesn't exist
$faq_table = "CREATE TABLE IF NOT EXISTS faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255),
    answer TEXT
);";

if (!$conn->query($faq_table)) {
    die("Error creating table: " . $conn->error);
}

// Adding some FAQs
$insert_faqs = "INSERT INTO faqs (question, answer) VALUES
    ('How to create an account?', 'You can create an account by clicking on the signup option.'),
    ('How to reset the password?', 'Click on forgot password at the login page to reset your password.'),
    ('Are there any subscription fees?', 'No, it is completely free to read comics and graphic novels.');";

// Check if FAQs exist by counting rows
$faq_check = "SELECT COUNT(*) as count FROM faqs";
$result = $conn->query($faq_check);
$row = $result->fetch_assoc();

if ($row['count'] == 0) {
    if (!$conn->query($insert_faqs)) {
        die("Error inserting FAQs: " . $conn->error);
    }
}

// Handle FAQ request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $faqs_query = "SELECT question, answer FROM faqs";
    $result = $conn->query($faqs_query);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>FAQ - Online Comic and Graphic Novel Library</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                color: #333;
                margin: 0;
                padding: 0;
            }
            .header {
                background-color: #d33b2c;
                color: #fff;
                text-align: center;
                padding: 20px 0;
            }
            .faq-container {
                max-width: 800px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .faq {
                margin-bottom: 20px;
            }
            .faq h3 {
                margin-top: 0;
            }
            .faq p {
                margin-bottom: 0;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>FAQ - Desktop Computers Online Comic and Graphic Novel Library</h1>
        </div>
        
        <div class="faq-container">
            <?php while($faq = $result->fetch_assoc()): ?>
                <div class="faq">
                    <h3><?php echo htmlspecialchars($faq['question']); ?></h3>
                    <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </body>
    </html>

    <?php
}
$conn->close();
?>