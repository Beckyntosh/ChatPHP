CREATE TABLE IF NOT EXISTS feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
message VARCHAR(255) NOT NULL,
enc_message VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO feedback (message, enc_message) VALUES ('This is a test message 1', 'encrypted_message_1');
INSERT INTO feedback (message, enc_message) VALUES ('Another test message 2', 'encrypted_message_2');
INSERT INTO feedback (message, enc_message) VALUES ('Third test message', 'encrypted_message_3');
INSERT INTO feedback (message, enc_message) VALUES ('Hello from user 4', 'encrypted_message_4');
INSERT INTO feedback (message, enc_message) VALUES ('Testing Encryption 5', 'encrypted_message_5');
INSERT INTO feedback (message, enc_message) VALUES ('Random message 6', 'encrypted_message_6');
INSERT INTO feedback (message, enc_message) VALUES ('User feedback 7', 'encrypted_message_7');
INSERT INTO feedback (message, enc_message) VALUES ('Important message 8', 'encrypted_message_8');
INSERT INTO feedback (message, enc_message) VALUES ('Encryption working 9', 'encrypted_message_9');
INSERT INTO feedback (message, enc_message) VALUES ('Final test message 10', 'encrypted_message_10');
