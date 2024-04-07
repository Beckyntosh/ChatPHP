-- Table creation for Products
CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description VARCHAR(255),
price DECIMAL(10,2) NOT NULL,
genre VARCHAR(50),
release_date DATE,
img_url VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inserting values into Products table
INSERT INTO Products (name, description, price, genre, release_date, img_url) VALUES 
("Game1", "Description of Game1", 29.99, "Action", "2021-01-15", "img1.jpg"),
("Game2", "Description of Game2", 19.99, "Adventure", "2020-05-10", "img2.jpg"),
("Game3", "Description of Game3", 39.99, "RPG", "2019-12-03", "img3.jpg"),
("Game4", "Description of Game4", 24.99, "Strategy", "2018-08-20", "img4.jpg"),
("Game5", "Description of Game5", 49.99, "Survival", "2021-03-05", "img5.jpg"),
("Game6", "Description of Game6", 34.99, "Shooter", "2022-02-17", "img6.jpg"),
("Game7", "Description of Game7", 14.99, "Puzzle", "2017-11-30", "img7.jpg"),
("Game8", "Description of Game8", 19.99, "Simulation", "2016-06-25", "img8.jpg"),
("Game9", "Description of Game9", 44.99, "Horror", "2020-09-12", "img9.jpg"),
("Game10", "Description of Game10", 29.99, "Open World", "2015-04-09", "img10.jpg");

-- Table creation for Comparison
CREATE TABLE IF NOT EXISTS Comparison (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id INT(6) UNSIGNED,
FOREIGN KEY (product_id) REFERENCES Products(id),
user_id INT(6) UNSIGNED,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
