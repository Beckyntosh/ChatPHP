CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  verification_code VARCHAR(50),
  is_verified BOOLEAN NOT NULL DEFAULT FALSE,
  reg_date TIMESTAMP
);

INSERT INTO users (username, email, verification_code) VALUES ('john_doe', 'john.doe@example.com', 'abcdef12345');
INSERT INTO users (username, email, verification_code) VALUES ('jane_smith', 'jane.smith@example.com', 'qwerty67890');
INSERT INTO users (username, email, verification_code) VALUES ('mike_jones', 'mike.jones@example.com', 'hijklm45678');
INSERT INTO users (username, email, verification_code) VALUES ('emily_brown', 'emily.brown@example.com', 'nopqrs23456');
INSERT INTO users (username, email, verification_code) VALUES ('sam_taylor', 'sam.taylor@example.com', 'uvwxyz12345');
INSERT INTO users (username, email, verification_code) VALUES ('lauren_cook', 'lauren.cook@example.com', '123456abcdef');
INSERT INTO users (username, email, verification_code) VALUES ('chris_green', 'chris.green@example.com', '7890xyzijklm');
INSERT INTO users (username, email, verification_code) VALUES ('sarah_hill', 'sarah.hill@example.com', '3456mnopqrs');
INSERT INTO users (username, email, verification_code) VALUES ('kevin_gray', 'kevin.gray@example.com', '23456abcdef12');
INSERT INTO users (username, email, verification_code) VALUES ('lisa_king', 'lisa.king@example.com', '5678hijklmnop');