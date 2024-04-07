CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
category VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (firstname, lastname, email, password) VALUES ('Alice', 'Smith', 'alice@example.com', 'password123'),
('Bob', 'Johnson', 'bob@example.com', 'securepass321'),
('Charlie', 'Brown', 'charlie@example.com', 'p@ssWord'),
('David', 'Lee', 'david@example.com', 'dlee987');

INSERT INTO preferences (user_id, category) VALUES (1, 'Sports'),
(1, 'Technology'),
(2, 'Fashion'),
(3, 'Sports'),
(3, 'Fashion'),
(3, 'Technology'),
(4, 'Technology');