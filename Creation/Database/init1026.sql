CREATE TABLE IF NOT EXISTS user_reset_password (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    token_expire DATETIME NOT NULL,
    INDEX(user_email),
    INDEX(token)
);

INSERT INTO user_reset_password (user_email, token, token_expire) VALUES ('user1@example.com', 'token123', '2022-12-31 23:59:59'),
('user2@example.com', 'token456', '2022-12-31 23:59:59'),
('user3@example.com', 'token789', '2022-12-31 23:59:59'),
('user4@example.com', 'tokenabc', '2022-12-31 23:59:59'),
('user5@example.com', 'tokendef', '2022-12-31 23:59:59'),
('user6@example.com', 'tokenghi', '2022-12-31 23:59:59'),
('user7@example.com', 'tokenjkl', '2022-12-31 23:59:59'),
('user8@example.com', 'tokenmno', '2022-12-31 23:59:59'),
('user9@example.com', 'tokenpqr', '2022-12-31 23:59:59'),
('user10@example.com', 'tokenstu', '2022-12-31 23:59:59');