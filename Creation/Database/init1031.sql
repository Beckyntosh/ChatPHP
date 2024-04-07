CREATE TABLE IF NOT EXISTS user_messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender_id VARCHAR(30) NOT NULL,
    receiver_id VARCHAR(30) NOT NULL,
    message TEXT NOT NULL,
    encryption_key VARCHAR(64) NOT NULL,
    iv VARCHAR(64) NOT NULL,
    reg_date TIMESTAMP
    );

INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('Alice', 'Bob', 'Hello', 'mysecretkey', '5f52a47cfcb5505d');
INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('Bob', 'Alice', 'Hi there', 'longencryptionkey', 'a87921c1c7714de3');
INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('John', 'Mary', 'Goodbye', 'secretpassphrase', 'ceaa8e83438b9621');
INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('Mary', 'John', 'See you soon', 'strongkey123', 'f6ee241b576fd624');
INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('Alice', 'Eve', 'Don\'t eavesdrop', 'securekey321', 'b52f623c881ff0ce');
INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('Eve', 'Alice', 'I promise', 'someencryption', 'a743b8742263b8a6');
INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('Michael', 'Sarah', 'Secret plans', 'confidentialkey', '85cec5c64efc6683');
INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('Sarah', 'Michael', 'Understood', 'safeandsecure', 'a52d8f01b835d971');
INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('Jane', 'Mark', 'Meeting details', 'hiddenmessage', 'f97e0284d77d0c0d');
INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv) VALUES ('Mark', 'Jane', 'Got it', 'endtoendcrypto', '0f86b76ab5f09989');
