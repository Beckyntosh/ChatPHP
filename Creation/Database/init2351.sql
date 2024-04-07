CREATE TABLE IF NOT EXISTS members (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO members (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password123');
INSERT INTO members (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', 'pass123word');
INSERT INTO members (username, email, password) VALUES ('bob_jackson', 'bob.jackson@example.com', 'securePW');
INSERT INTO members (username, email, password) VALUES ('alice_brown', 'alice.brown@example.com', 'password1234');
INSERT INTO members (username, email, password) VALUES ('sam_wilson', 'sam.wilson@example.com', 'pass4321word');
INSERT INTO members (username, email, password) VALUES ('linda_green', 'linda.green@example.com', 'passwordxyz');
INSERT INTO members (username, email, password) VALUES ('mike_davis', 'mike.davis@example.com', '4321pass');
INSERT INTO members (username, email, password) VALUES ('sarah_clark', 'sarah.clark@example.com', 'pw6543xyz');
