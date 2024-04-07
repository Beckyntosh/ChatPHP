CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    verification_code VARCHAR(255) NOT NULL,
    verified INT NOT NULL
);

INSERT INTO users (email, password, verification_code, verified) VALUES
('user1@example.com', 'password1', 'abc123', 1),
('user2@example.com', 'password2', 'def456', 0),
('user3@example.com', 'password3', 'ghi789', 1),
('user4@example.com', 'password4', 'jkl012', 0),
('user5@example.com', 'password5', 'mno345', 1),
('user6@example.com', 'password6', 'pqr678', 0),
('user7@example.com', 'password7', 'stu901', 1),
('user8@example.com', 'password8', 'vwx234', 0),
('user9@example.com', 'password9', 'yzu567', 1),
('user10@example.com', 'password10', 'abc890', 0);