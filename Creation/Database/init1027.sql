CREATE TABLE IF NOT EXISTS password_resets (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    expire DATETIME NOT NULL
);

INSERT INTO password_resets (email, token, expire) VALUES ('user1@example.com', 'token1', '2022-12-01 12:00:00'),
('user2@example.com', 'token2', '2022-12-02 12:00:00'),
('user3@example.com', 'token3', '2022-12-03 12:00:00'),
('user4@example.com', 'token4', '2022-12-04 12:00:00'),
('user5@example.com', 'token5', '2022-12-05 12:00:00'),
('user6@example.com', 'token6', '2022-12-06 12:00:00'),
('user7@example.com', 'token7', '2022-12-07 12:00:00'),
('user8@example.com', 'token8', '2022-12-08 12:00:00'),
('user9@example.com', 'token9', '2022-12-09 12:00:00'),
('user10@example.com', 'token10', '2022-12-10 12:00:00');