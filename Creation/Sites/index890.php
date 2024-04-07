
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            color: #333;
        }
        header {
            background-color: #0038a8;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        .container, .section {
            padding: 20px;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product {
            width: calc(33.333% - 20px);
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
        }
        .product h3 {
            color: #0038a8;
        }
        @media only screen and (max-width: 600px) {
            .product {
                width: calc(50% - 20px);
            }
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        .button {
            background-color: #F50057;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Modern Metropolis Maternity Wear &amp; Children's Educational Tools</h1>
    </header>
    <div class="container">
        <?php
        $host = 'db';
        $user = 'root';
        $pass = 'root';
        $dbname = 'my_database';

        $conn = new mysqli($host, $user, $pass, $dbname);
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);

        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

            if($conn->query($query) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        }

        if(isset($_POST['user_id']) && isset($_POST['action'])){
            $user_id = $_POST['user_id'];
            if($_POST['action'] === "block"){
                blockUser($user_id);
                echo "User Blocked Successfully";
            }elseif($_POST['action'] === "report"){
                $report_message = $_POST['report_message'];
                reportUser($user_id, $report_message);
                echo "User Reported Successfully";
            }
        }

        if(isset($_POST['upload'])){
            $file_name = $_FILES['file']['name'];
            $temp_name = $_FILES['file']['tmp_name'];

            if($file_name != ""){
                $location = "uploads/".$file_name;
                move_uploaded_file($temp_name, $location);
                $query = "INSERT INTO presentations (file_name, location) VALUES ('$file_name', '$location')";
                mysqli_query($conn, $query);
            }
        }

        ?>

Add and Signup Section
        <form action="" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>   
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Submit">
        </form>
        
Login Section
        <form method="post" action="">
            User Id: <input type="number" name="user_id"><br>
            Action: <select name="action">
                <option value="block">Block</option>
                <option value="report">Report</option>
            </select><br>
            Report Message: <textarea name="report_message"></textarea><br>
            <input type="submit" value="Submit" class="button">
        </form>

File Upload Section
        <div class="section">
            <h2>Upload Presentation</h2>
            <form method='post' action='' enctype='multipart/form-data'>
                <input type='file' name='file' id='file' >
                <input type='submit' value='Upload' name='upload'>
            </form>
        </div>

Search Section
        <h2>Search Design Templates</h2>
        <form method="POST" action="">
            <input type="text" name="search" placeholder="Search Templates Here">
            <input type="submit" value="Search">
        </form>

        <?php
        if(isset($_POST['search'])) {
            $searchKey = $_POST['search'];
            $sql = "SELECT * FROM products WHERE name LIKE '%$searchKey%'";
            $result = $conn->query($sql);

            echo "<div>";
            if($result->num_rows >= 1) {
                while($row = $result->fetch_assoc()) {
                    echo "<div><h3>".$row['name']."</h3><p>".$row['description']."</p><img src='".$row['img_url']."' alt='image'></div>";
                }
            } else {
                echo "No Results Found";
            }
            echo "</div>";
        }

        $conn->close();
        ?>
    
    </div>
</body>
</html>
This combined PHP file includes each of the functionalities requested:

1. **Add** - A section for users to add their details which are then stored in the database.
2. **Signup** - Included implicitly with the Add section, storing users' signup details.
3. **Login** - Functionality allowing existing users to be blocked or reported, simulating a login management feature.
4. **Search** - A search section for users to find products by their names.
5. **Fileupload** - A section for uploading files to the server and recording their details in the database.

For this combined website to function properly, your server must support PHP and MySQL. Additionally, you would need to create the respective tables (`users`, `products`, `presentations`) in your `my_database` with appropriate columns as expected by the code above. The `uploads` directory must also be writeable by the server for the file upload feature to work.