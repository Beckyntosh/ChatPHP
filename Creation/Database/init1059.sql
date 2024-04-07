CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_name VARCHAR(50) NOT NULL,
review TEXT NOT NULL,
rating INT(1) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO reviews (user_name, review, rating) VALUES ('John Doe', 'Great app, I love it!', 5);
INSERT INTO reviews (user_name, review, rating) VALUES ('Jane Smith', 'The futuristic design is amazing', 4);
INSERT INTO reviews (user_name, review, rating) VALUES ('Alice Johnson', 'Could use more functionality', 3);
INSERT INTO reviews (user_name, review, rating) VALUES ('Bob Davis', 'Easy to use and stylish', 5);
INSERT INTO reviews (user_name, review, rating) VALUES ('Emily Clark', 'Not what I expected', 2);
INSERT INTO reviews (user_name, review, rating) VALUES ('Michael Brown', 'Impressive features', 4);
INSERT INTO reviews (user_name, review, rating) VALUES ('Sarah White', 'Sleek design, but lacking in options', 3);
INSERT INTO reviews (user_name, review, rating) VALUES ('Chris Wilson', 'Overall satisfied with the app', 4);
INSERT INTO reviews (user_name, review, rating) VALUES ('Laura Martinez', 'Needs more updates', 3);
INSERT INTO reviews (user_name, review, rating) VALUES ('Kevin Lee', 'Futuristic and functional', 5);