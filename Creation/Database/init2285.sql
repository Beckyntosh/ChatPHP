CREATE TABLE IF NOT EXISTS users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
verified TINYINT(1) NOT NULL DEFAULT '0',
verification_code VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, verified, verification_code) VALUES ('JohnDoe', 'johndoe@example.com', 0, 'asdf1234');
INSERT INTO users (username, email, verified, verification_code) VALUES ('JaneSmith', 'janesmith@example.com', 0, 'qwer5678');
INSERT INTO users (username, email, verified, verification_code) VALUES ('AliceJones', 'alicejones@example.com', 0, 'zxcv9876');
INSERT INTO users (username, email, verified, verification_code) VALUES ('BobBrown', 'bobbrown@example.com', 0, 'jklm4321');
INSERT INTO users (username, email, verified, verification_code) VALUES ('SarahLee', 'sarahlee@example.com', 0, 'poiu8765');
INSERT INTO users (username, email, verified, verification_code) VALUES ('MarkTaylor', 'marktaylor@example.com', 0, 'mnbv5432');
INSERT INTO users (username, email, verified, verification_code) VALUES ('EmilyDavis', 'emilydavis@example.com', 0, 'ytrewq123');
INSERT INTO users (username, email, verified, verification_code) VALUES ('ChrisWilson', 'chriswilson@example.com', 0, 'lkjh6543');
INSERT INTO users (username, email, verified, verification_code) VALUES ('LauraMoore', 'lauramoore@example.com', 0, 'xcvb7654');
INSERT INTO users (username, email, verified, verification_code) VALUES ('KevinRoss', 'kevinross@example.com', 0, 'uiop2345');
