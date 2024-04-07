CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(50) NOT NULL,
user_name VARCHAR(50),
rating INT(10),
review TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Piano', 'Alice', 4, 'Great quality sound and easy to play');
INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Guitar', 'Bob', 5, 'Amazing instrument, highly recommended');
INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Violin', 'Charlie', 3, 'Decent sound but a bit fragile');
INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Drums', 'David', 4, 'Fun to play and good for beginners');
INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Flute', 'Emily', 5, 'Beautiful sound and easy to carry around');
INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Saxophone', 'Frank', 4, 'Smooth tones and great for jazz music');
INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Trumpet', 'Grace', 3, 'Challenging to learn but rewarding once mastered');
INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Harp', 'Henry', 5, 'Magical instrument with soothing melodies');
INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Cello', 'Ivy', 4, 'Rich tones and a versatile instrument');
INSERT INTO reviews (product_name, user_name, rating, review) VALUES ('Xylophone', 'Jack', 2, 'Limited range but fun for kids to play');
