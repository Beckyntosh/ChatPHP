CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment TEXT
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    rating INT,
    content TEXT
);

INSERT INTO comments (comment) VALUES
('Great website!'),
('Interesting content.'),
('I like the design.'),
('Very informative.'),
('Well done.');

INSERT INTO users (username, password) VALUES
('john_doe', 'password123'),
('jane_smith', 'abc123'),
('bob_the_builder', 'buildit'),
('amy_wong', 'p@ssw0rd'),
('david_jones', 'securepw');

INSERT INTO ratings (user_id, product_id, rating, content) VALUES
(1, 101, 4, 'This product exceeded my expectations!'),
(2, 102, 3, 'Good quality but could be better.'),
(3, 103, 5, 'Absolutely love it!'),
(4, 104, 2, 'Not what I expected.'),
(5, 105, 4, 'Great value for the price.'),
(1, 106, 5, 'Amazing product, highly recommend.'),
(2, 107, 3, 'Average, nothing special.'),
(3, 108, 4, 'Impressed with the performance.'),
(4, 109, 1, 'Would not recommend.'),
(5, 110, 5, 'Best purchase I have made.');
