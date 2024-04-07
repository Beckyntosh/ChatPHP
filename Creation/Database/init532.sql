CREATE TABLE IF NOT EXISTS user_account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reset_token VARCHAR(255),
    token_expiry DATETIME
);

INSERT INTO user_account (email, password, reset_token, token_expiry) VALUES
('test1@example.com', 'password1', NULL, NULL),
('test2@example.com', 'password2', 'token2', '2023-01-01 12:00:00'),
('test3@example.com', 'password3', NULL, NULL),
('test4@example.com', 'password4', 'token4', '2023-01-01 12:00:00'),
('test5@example.com', 'password5', NULL, NULL),
('test6@example.com', 'password6', 'token6', '2023-01-01 12:00:00'),
('test7@example.com', 'password7', NULL, NULL),
('test8@example.com', 'password8', 'token8', '2023-01-01 12:00:00'),
('test9@example.com', 'password9', NULL, NULL),
('test10@example.com', 'password10', 'token10', '2023-01-01 12:00:00');
