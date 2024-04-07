CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('admin', 'password_hash_1'),
('user1', 'password_hash_2'),
('user2', 'password_hash_3'),
('user3', 'password_hash_4'),
('user4', 'password_hash_5'),
('user5', 'password_hash_6'),
('user6', 'password_hash_7'),
('user7', 'password_hash_8'),
('user8', 'password_hash_9'),
('user9', 'password_hash_10');
