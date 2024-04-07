CREATE TABLE IF NOT EXISTS encrypted_messages (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
message TEXT NOT NULL,
creation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 1');
INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 2');
INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 3');
INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 4');
INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 5');
INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 6');
INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 7');
INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 8');
INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 9');
INSERT INTO encrypted_messages (message) VALUES ('This is a confidential message 10');
