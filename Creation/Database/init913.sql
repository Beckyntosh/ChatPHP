CREATE TABLE IF NOT EXISTS encrypted_emails (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email_address VARCHAR(255) NOT NULL,
email_content LONGTEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example1@email.com', 'encrypted_content_1');
INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example2@email.com', 'encrypted_content_2');
INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example3@email.com', 'encrypted_content_3');
INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example4@email.com', 'encrypted_content_4');
INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example5@email.com', 'encrypted_content_5');
INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example6@email.com', 'encrypted_content_6');
INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example7@email.com', 'encrypted_content_7');
INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example8@email.com', 'encrypted_content_8');
INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example9@email.com', 'encrypted_content_9');
INSERT INTO encrypted_emails (email_address, email_content) VALUES ('example10@email.com', 'encrypted_content_10');