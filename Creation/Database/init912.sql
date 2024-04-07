CREATE TABLE IF NOT EXISTS notification_emails (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
subject VARCHAR(100),
message TEXT,
enc_message TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO notification_emails (email, subject, message, enc_message) VALUES 
('test1@example.com', 'Subject 1', 'Message 1', 'Encrypted Message 1'),
('test2@example.com', 'Subject 2', 'Message 2', 'Encrypted Message 2'),
('test3@example.com', 'Subject 3', 'Message 3', 'Encrypted Message 3'),
('test4@example.com', 'Subject 4', 'Message 4', 'Encrypted Message 4'),
('test5@example.com', 'Subject 5', 'Message 5', 'Encrypted Message 5'),
('test6@example.com', 'Subject 6', 'Message 6', 'Encrypted Message 6'),
('test7@example.com', 'Subject 7', 'Message 7', 'Encrypted Message 7'),
('test8@example.com', 'Subject 8', 'Message 8', 'Encrypted Message 8'),
('test9@example.com', 'Subject 9', 'Message 9', 'Encrypted Message 9'),
('test10@example.com', 'Subject 10', 'Message 10', 'Encrypted Message 10');
