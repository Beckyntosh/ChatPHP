CREATE TABLE IF NOT EXISTS EncryptedEmails (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    encrypted_message TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('john@example.com', '8267adf1346f:423f1c86ae');
INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('jane@example.com', '134690df90a4:9267ce8d2f');
INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('alex@example.com', '65409dae17f2:4219cf9de3');
INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('mike@example.com', '9765efbc1234:621f09c0aa');
INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('sara@example.com', '7841bdfe920c:328fbadf91');
INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('chris@example.com', '6037adfe127c:1497fe9ad3');
INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('emily@example.com', '7219cbef9104:7849afe5c2');
INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('justin@example.com', '5432defa69be:2109cbfe16');
INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('lisa@example.com', '9013dabc7652:1457afec92');
INSERT INTO EncryptedEmails (email, encrypted_message) VALUES ('peter@example.com', '7529eabd210c:9875defa39');