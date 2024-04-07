CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS BrowsingHistory (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
product VARCHAR(50),
visit_time TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES Users(id)
);

INSERT INTO Users (username) VALUES ('Alice'), ('Bob'), ('Charlie'), ('David'), ('Eve'), ('Frank'), ('Grace'), ('Harry'), ('Ivy'), ('Jack');

INSERT INTO BrowsingHistory (user_id, product, visit_time) VALUES
(1, 'Laptop A', NOW()),
(2, 'Laptop B', NOW()),
(3, 'Laptop C', NOW()),
(4, 'Laptop D', NOW()),
(5, 'Laptop E', NOW()),
(6, 'Laptop F', NOW()),
(7, 'Laptop G', NOW()),
(8, 'Laptop H', NOW()),
(9, 'Laptop I', NOW()),
(10, 'Laptop J', NOW());