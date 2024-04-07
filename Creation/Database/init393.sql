
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    viewed_on TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (email, password) VALUES 
('user1@example.com', 'password1'),
('user2@example.com', 'password2'),
('user3@example.com', 'password3'),
('user4@example.com', 'password4'),
('user5@example.com', 'password5'),
('user6@example.com', 'password6'),
('user7@example.com', 'password7'),
('user8@example.com', 'password8'),
('user9@example.com', 'password9'),
('user10@example.com', 'password10');