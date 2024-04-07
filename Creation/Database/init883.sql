CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE friends (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    friend_id INT,
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending'
);

CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255),
    category VARCHAR(50),
    price DECIMAL(10,2),
    stock_quantity INT
);

INSERT INTO users (name, email) VALUES
('John Doe', 'john.doe@example.com'),
('Jane Smith', 'jane.smith@example.com'),
('Michael Johnson', 'michael.johnson@example.com'),
('Emily Davis', 'emily.davis@example.com'),
('Chris Wilson', 'chris.wilson@example.com'),
('Amanda Brown', 'amanda.brown@example.com'),
('Kevin Martinez', 'kevin.martinez@example.com'),
('Sarah Clark', 'sarah.clark@example.com'),
('Ryan Thomas', 'ryan.thomas@example.com'),
('Michelle Moore', 'michelle.moore@example.com');

INSERT INTO friends (user_id, friend_id) VALUES
(1, 2),
(1, 3),
(2, 4),
(3, 5),
(4, 6),
(5, 7),
(6, 8),
(7, 9),
(8, 10),
(9, 1);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Chair', 'Comfortable chair for home or office', 'Furniture', 99.99, 50),
('Laptop Stand', 'Adjustable laptop stand for ergonomic work setup', 'Office Accessories', 45.50, 30),
('Yoga Mat', 'Eco-friendly yoga mat for home workouts', 'Fitness', 29.99, 100),
('Essential Oil Diffuser', 'Aromatherapy diffuser for relaxation', 'Home Decor', 19.99, 80),
('Resistance Bands Set', 'Set of resistance bands for full-body workouts', 'Fitness', 15.99, 120),
('Wall Clock', 'Vintage-style wall clock for home decor', 'Home Decor', 39.99, 40),
('Stainless Steel Water Bottle', 'Reusable water bottle for on-the-go hydration', 'Wellness', 12.99, 150),
('LED Desk Lamp', 'Energy-efficient desk lamp for study or work', 'Office Accessories', 27.50, 60),
('Air Purifier', 'Compact air purifier for clean air in home or office', 'Wellness', 79.99, 20),
('Portable Blender', 'Mini blender for making smoothies anywhere', 'Kitchen Gadgets', 34.99, 70);
