<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baby Products Pet Adoption and Care Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 5px #aaa;
            border-radius: 8px;
        }
        .form-upload {
            background-color: #eee;
            padding: 15px;
            border-radius: 8px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .retro-style {
            font-family: 'Courier New', Courier, monospace;
            background-color: #ffefcf;
            border: 2px dashed #8c7044;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Subtitle File</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form-upload">
            <input type="file" name="subtitle_file" id="subtitle_file">
            <input type="submit" value="Upload" class="btn">
        </form>
    </div>

    <div class="container retro-style">
        <h1>Add Friend</h1>
        <form method="POST">
Assuming logged in user ID is 1 for demonstration
            <label for="friend_id">Friend's User ID:</label>
            <input type="text" id="friend_id" name="friend_id" required>
            <button type="submit" class="btn" name="add_friend">Send Friend Request</button>
        </form>
    </div>

    <header>
        <h1>Search Profiles - Home Decor Health and Wellness</h1>
    </header>

    <div class="container">
        <form method="post" class="search-box">
            <input type="text" name="search" placeholder="Search Products..." value="<?php echo htmlspecialchars($search_query); ?>" />
            <button type="submit">Search</button>
        </form>

        <?php if (!empty($search_results)): ?>
            <div>
                <h2>Search Results</h2>
                <?php foreach ($search_results as $product): ?>
                    <div class="product">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <p>Category: <?php echo htmlspecialchars($product['category']); ?></p>
                        <p>Price: $<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></p>
                        <p>In Stock: <?php echo htmlspecialchars($product['stock_quantity']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <p>No results found for '<?php echo htmlspecialchars($search_query); ?>'.</p>
        <?php endif; ?>
    </div>

</body>
</html>