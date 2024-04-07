CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(32),
    recovery_code VARCHAR(10),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, recovery_code, reg_date) VALUES
('User1', 'user1@example.com', 'password1', '123456', NOW()),
('User2', 'user2@example.com', 'password2', '654321', NOW()),
('User3', 'user3@example.com', 'password3', '987654', NOW()),
('User4', 'user4@example.com', 'password4', '456789', NOW()),
('User5', 'user5@example.com', 'password5', '987654', NOW()),
('User6', 'user6@example.com', 'password6', '321654', NOW()),
('User7', 'user7@example.com', 'password7', '654987', NOW()),
('User8', 'user8@example.com', 'password8', '105689', NOW()),
('User9', 'user9@example.com', 'password9', '789654', NOW()),
('User10', 'user10@example.com', 'password10', '456321', NOW());
