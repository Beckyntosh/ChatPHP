CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating INT(1),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO reviews (product_id, user_id, rating, comment) VALUES
(1, 1, 5, 'Great product, highly recommend'),
(1, 2, 4, 'Good value for money'),
(2, 3, 3, 'Average quality'),
(3, 1, 5, 'Amazing, exceeded expectations'),
(4, 2, 2, 'Disappointing quality'),
(5, 3, 4, 'Good customer service'),
(2, 1, 1, 'Worst product ever purchased'),
(5, 3, 5, 'Top-notch product'),
(3, 2, 4, 'Satisfied with the purchase'),
(4, 1, 3, 'Could be better quality');

CREATE TABLE IF NOT EXISTS volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(50),
    age INT,
    skills TEXT,
    availability TEXT
);

INSERT INTO volunteers (name, email, age, skills, availability) VALUES
('John Doe', 'john.doe@example.com', 25, 'Programming, Design', 'Weekdays'),
('Alice Smith', 'alice.smith@example.com', 30, 'Marketing, Communication', 'Weekend'),
('Bob Johnson', 'bob.johnson@example.com', 28, 'Writing, Editing', 'Flexible'),
('Emily Davis', 'emily.davis@example.com', 22, 'Data Analysis, Research', 'Evenings'),
('David Brown', 'david.brown@example.com', 35, 'Teaching, Training', 'Weekdays'),
('Sarah Wilson', 'sarah.wilson@example.com', 40, 'Project Management, Leadership', 'Weekend'),
('Michael Lee', 'michael.lee@example.com', 27, 'Customer Service, Sales', 'Flexible'),
('Olivia Taylor', 'olivia.taylor@example.com', 33, 'Graphic Design, Illustration', 'Evenings'),
('Daniel Clark', 'daniel.clark@example.com', 29, 'Event Planning, Coordination', 'Weekdays'),
('Sophia Rodriguez', 'sophia.rodriguez@example.com', 26, 'Social Media Management, Content Creation', 'Weekend');

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product G', 'Description of Product G', 'Category1', 79.99, 120),
('Product H', 'Description of Product H', 'Category2', 89.99, 50),
('Product I', 'Description of Product I', 'Category1', 99.99, 70),
('Product J', 'Description of Product J', 'Category3', 109.99, 90),
('Product K', 'Description of Product K', 'Category2', 119.99, 30),
('Product L', 'Description of Product L', 'Category3', 129.99, 40);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES
('user4', 'User Four', 'user4@example.com', md5('password4')),
('user5', 'User Five', 'user5@example.com', md5('password5')),
('user6', 'User Six', 'user6@example.com', md5('password6'));
