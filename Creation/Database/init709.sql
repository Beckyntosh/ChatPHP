CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    author_id INT,
    post_date DATETIME,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES 
('Shoes', 'Comfortable running shoes', 'Sports', 69.99, 100),
('Sandals', 'Casual beach sandals', 'Fashion', 29.99, 50),
('Boots', 'Stylish winter boots', 'Fashion', 89.99, 75),
('Sneakers', 'Trendy street sneakers', 'Fashion', 49.99, 120),
('Slippers', 'Cozy indoor slippers', 'Home', 19.99, 80),
('Heels', 'Elegant evening heels', 'Fashion', 79.99, 60),
('Flip Flops', 'Summer flip flops', 'Fashion', 9.99, 40),
('Loafers', 'Classic leather loafers', 'Fashion', 59.99, 90),
('Wedges', 'Chic high wedges', 'Fashion', 69.99, 70),
('Brogues', 'Vintage brogues', 'Fashion', 64.99, 55);

INSERT INTO users (username, name, email, password) VALUES 
('john_doe', 'John Doe', 'john.doe@example.com', 'password123'),
('jane_smith', 'Jane Smith', 'jane.smith@example.com', 'abc123'),
('mike_jackson', 'Mike Jackson', 'mike.jackson@example.com', 'pass456'),
('sarah_brown', 'Sarah Brown', 'sarah.brown@example.com', 'qwerty'),
('david_wilson', 'David Wilson', 'david.wilson@example.com', '123456'),
('emily_roberts', 'Emily Roberts', 'emily.roberts@example.com', 'hello123'),
('chris_evans', 'Chris Evans', 'chris.evans@example.com', 'pwd456'),
('laura_hall', 'Laura Hall', 'laura.hall@example.com', 'letmein'),
('sam_carter', 'Sam Carter', 'sam.carter@example.com', 'test123'),
('olivia_adams', 'Olivia Adams', 'olivia.adams@example.com', 'abcxyz');

INSERT INTO blog_posts (title, content, author_id, post_date) VALUES 
('Running Tips', 'Here are some tips for beginners looking to start running.', 1, '2022-06-01 08:00:00'),
('Summer Shoe Trends', 'Discover the latest summer shoe trends for 2022.', 4, '2022-05-20 10:15:00'),
('Choosing the Right Boots', 'Find out how to pick the perfect boots for any occasion.', 3, '2022-04-15 16:30:00'),
('Fashion Week Recap', 'A recap of the hottest trends from this year\'s fashion week.', 2, '2022-03-10 11:45:00'),
('Styling Sneakers', 'Tips on how to style your sneakers for a casual look.', 5, '2022-02-05 09:20:00'),
('Comfortable Slippers', 'Stay cozy with these comfortable slippers for lounging at home.', 1, '2022-01-02 13:10:00'),
('Night Out Heels', 'Get ready for a night out with these glamorous heels.', 6, '2021-12-01 18:00:00'),
('Beach-ready Flip Flops', 'Essential flip flops for a day at the beach.', 7, '2021-11-20 14:30:00'),
('Classic Loafers', 'The timeless appeal of classic leather loafers.', 9, '2021-10-15 10:45:00'),
('Elevate with Wedges', 'Add height and style with chic high wedges.', 8, '2021-09-12 12:20:00');
