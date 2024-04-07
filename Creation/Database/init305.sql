CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    verification_code VARCHAR(255) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code) VALUES 
('user1', 'user1@example.com', 'password1', 'abc123'),
('user2', 'user2@example.com', 'password2', 'def456'),
('user3', 'user3@example.com', 'password3', 'ghi789'),
('user4', 'user4@example.com', 'password4', 'jkl012'),
('user5', 'user5@example.com', 'password5', 'mno345'),
('user6', 'user6@example.com', 'password6', 'pqr678'),
('user7', 'user7@example.com', 'password7', 'stu901'),
('user8', 'user8@example.com', 'password8', 'vwx234'),
('user9', 'user9@example.com', 'password9', 'yza567'),
('user10', 'user10@example.com', 'password10', 'bcd890');