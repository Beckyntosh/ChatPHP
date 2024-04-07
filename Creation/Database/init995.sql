CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(50) NOT NULL,
rating INT NOT NULL,
review VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(32) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO reviews (destination, rating, review) VALUES ('Paris', 5, 'Amazing city with beautiful landmarks');
INSERT INTO reviews (destination, rating, review) VALUES ('Tokyo', 4, 'Great shopping and dining experience');
INSERT INTO reviews (destination, rating, review) VALUES ('Bali', 5, 'Relaxing beach vacation');
INSERT INTO reviews (destination, rating, review) VALUES ('New York', 4, 'Vibrant city with lots to do');
INSERT INTO reviews (destination, rating, review) VALUES ('Barcelona', 3, 'Nice weather but crowded tourist spots');
INSERT INTO reviews (destination, rating, review) VALUES ('Dubai', 5, 'Luxurious experience with amazing skyscrapers');
INSERT INTO reviews (destination, rating, review) VALUES ('Santorini', 4, 'Beautiful views and sunsets');
INSERT INTO reviews (destination, rating, review) VALUES ('Rome', 4, 'Rich history and delicious food');
INSERT INTO reviews (destination, rating, review) VALUES ('Sydney', 5, 'Friendly people and stunning harbor');
INSERT INTO reviews (destination, rating, review) VALUES ('Maui', 4, 'Paradise for beach lovers');
