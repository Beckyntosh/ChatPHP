CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment TEXT
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    rating INT,
    review TEXT
);

-- Insert values into tables
INSERT INTO comments (comment) VALUES
('Great website!'),
('Love the design.'),
('User-friendly interface.'),
('Awesome job!'),
('I enjoyed exploring this site.'),
('Keep up the good work.'),
('Very informative content.'),
('Impressed with the layout.'),
('Amazing features.'),
('Highly recommended.');

INSERT INTO users (username, password) VALUES
('john_doe', '12345'),
('jane_smith', 'abcde'),
('user123', 'password'),
('test_user', 'test123');

INSERT INTO ratings (user_id, product_id, rating, review) VALUES
(1, 101, 5, 'Great product! Highly recommended.'),
(2, 102, 4, 'Good quality and design.'),
(3, 103, 3, 'Average product.'),
(4, 104, 5, 'Excellent service! Will buy again.');

-- Add more INSERT statements as needed for the research purposes, 10 values have been provided.