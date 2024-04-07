CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(50) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO newsletter_subscribers (email, token, verified, reg_date)
VALUES ('example1@example.com', 'abc123', 1, NOW()),
       ('example2@example.com', 'def456', 0, NOW()),
       ('example3@example.com', 'ghi789', 1, NOW()),
       ('example4@example.com', 'jkl012', 0, NOW()),
       ('example5@example.com', 'mno345', 1, NOW()),
       ('example6@example.com', 'pqr678', 0, NOW()),
       ('example7@example.com', 'stu901', 1, NOW()),
       ('example8@example.com', 'vwx234', 0, NOW()),
       ('example9@example.com', 'yza567', 1, NOW()),
       ('example10@example.com', 'bcd890', 0, NOW());
