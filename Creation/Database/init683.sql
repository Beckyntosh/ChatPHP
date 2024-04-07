CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES
('user1', 'User One', 'user1@example.com', SHA1('password1')),
('user2', 'User Two', 'user2@example.com', SHA1('password2')),
('user3', 'User Three', 'user3@example.com', SHA1('password3')),
('user4', 'User Four', 'user4@example.com', SHA1('password4')),
('user5', 'User Five', 'user5@example.com', SHA1('password5')),
('user6', 'User Six', 'user6@example.com', SHA1('password6')),
('user7', 'User Seven', 'user7@example.com', SHA1('password7')),
('user8', 'User Eight', 'user8@example.com', SHA1('password8')),
('user9', 'User Nine', 'user9@example.com', SHA1('password9')),
('user10', 'User Ten', 'user10@example.com', SHA1('password10'));

CREATE TABLE IF NOT EXISTS sessions (
    session_id CHAR(128) PRIMARY KEY,
    user_id INT,
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);