CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('john_doe', 'password1'),
('jane_smith', 'password2'),
('mike_jones', 'password3'),
('sarah_davis', 'password4'),
('chris_parker', 'password5'),
('emily_wilson', 'password6'),
('alex_garcia', 'password7'),
('lisa_miller', 'password8'),
('ryan_clark', 'password9'),
('katie_brown', 'password10');