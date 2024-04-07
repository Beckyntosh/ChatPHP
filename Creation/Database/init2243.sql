CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO subscribers (email) VALUES ('example1@example.com');
INSERT INTO subscribers (email) VALUES ('example2@example.com');
INSERT INTO subscribers (email) VALUES ('example3@example.com');
INSERT INTO subscribers (email) VALUES ('example4@example.com');
INSERT INTO subscribers (email) VALUES ('example5@example.com');
INSERT INTO subscribers (email) VALUES ('example6@example.com');
INSERT INTO subscribers (email) VALUES ('example7@example.com');
INSERT INTO subscribers (email) VALUES ('example8@example.com');
INSERT INTO subscribers (email) VALUES ('example9@example.com');
INSERT INTO subscribers (email) VALUES ('example10@example.com');
