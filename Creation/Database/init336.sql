CREATE TABLE IF NOT EXISTS account_recovery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    email VARCHAR(50),
    verification_code VARCHAR(10),
    verified TINYINT(1) DEFAULT 0,
    request_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO account_recovery (user_id, email, verification_code) VALUES 
(1, 'email1@example.com', '123456'),
(2, 'email2@example.com', '654321'),
(3, 'email3@example.com', '987654'),
(4, 'email4@example.com', '456789'),
(5, 'email5@example.com', '321654'),
(6, 'email6@example.com', '987123'),
(7, 'email7@example.com', '456321'),
(8, 'email8@example.com', '654987'),
(9, 'email9@example.com', '321789'),
(10, 'email10@example.com', '789654');

