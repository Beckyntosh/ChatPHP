CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES 
('john_doe', 'password123'),
('jane_smith', 'securePassword!'),
('bobby_brown', 'letMeIn123'),
('sara_martin', 'p@ssw0rd'),
('alex_richards', 'mySecretPass'),
('emily_white', 'password987'),
('mike_jackson', 'secure123#'),
('lisa_taylor', 'myPassWord!'),
('robert_green', 'passWord321'),
('amy_evans', 'securepassWord');
