CREATE TABLE IF NOT EXISTS newsletter_signup (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    confirmation_code VARCHAR(50) NOT NULL,
    confirmed TINYINT(1) DEFAULT 0,
    signup_date TIMESTAMP
);

INSERT INTO newsletter_signup (email, confirmation_code, confirmed, signup_date) VALUES ('example1@example.com', 'abcdef123', 0, NOW()),
('example2@example.com', 'ghijk456', 0, NOW()),
('example3@example.com', 'lmnop789', 0, NOW()),
('example4@example.com', 'qrstuv123', 0, NOW()),
('example5@example.com', 'wxyz456', 0, NOW()),
('example6@example.com', 'abc123def', 0, NOW()),
('example7@example.com', 'ghi456jkl', 0, NOW()),
('example8@example.com', 'mno789pqr', 0, NOW()),
('example9@example.com', 'stu123vwx', 0, NOW()),
('example10@example.com', 'yz456abc', 0, NOW());