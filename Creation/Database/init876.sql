CREATE TABLE IF NOT EXISTS podcasts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description TEXT,
file_path VARCHAR(255)
);

INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 1', 'Description for Podcast 1', 'uploads/podcast1.mp3');
INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 2', 'Description for Podcast 2', 'uploads/podcast2.mp3');
INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 3', 'Description for Podcast 3', 'uploads/podcast3.mp3');
INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 4', 'Description for Podcast 4', 'uploads/podcast4.mp3');
INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 5', 'Description for Podcast 5', 'uploads/podcast5.mp3');
INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 6', 'Description for Podcast 6', 'uploads/podcast6.mp3');
INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 7', 'Description for Podcast 7', 'uploads/podcast7.mp3');
INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 8', 'Description for Podcast 8', 'uploads/podcast8.mp3');
INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 9', 'Description for Podcast 9', 'uploads/podcast9.mp3');
INSERT INTO podcasts (title, description, file_path) VALUES ('Podcast 10', 'Description for Podcast 10', 'uploads/podcast10.mp3');

CREATE TABLE IF NOT EXISTS orders (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
product_id INT,
order_status VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (product_id) REFERENCES products(id)
);

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

CREATE TABLE IF NOT EXISTS attachments (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
filename VARCHAR(255),
upload_date DATETIME DEFAULT CURRENT_TIMESTAMP
);
