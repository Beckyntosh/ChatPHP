CREATE TABLE session_data (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    session_key VARCHAR(255) NOT NULL,
    encrypted_value TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO session_data (session_key, encrypted_value) VALUES ('1', 'encrypted_value_1');
INSERT INTO session_data (session_key, encrypted_value) VALUES ('2', 'encrypted_value_2');
INSERT INTO session_data (session_key, encrypted_value) VALUES ('3', 'encrypted_value_3');
INSERT INTO session_data (session_key, encrypted_value) VALUES ('4', 'encrypted_value_4');
INSERT INTO session_data (session_key, encrypted_value) VALUES ('5', 'encrypted_value_5');
INSERT INTO session_data (session_key, encrypted_value) VALUES ('6', 'encrypted_value_6');
INSERT INTO session_data (session_key, encrypted_value) VALUES ('7', 'encrypted_value_7');
INSERT INTO session_data (session_key, encrypted_value) VALUES ('8', 'encrypted_value_8');
INSERT INTO session_data (session_key, encrypted_value) VALUES ('9', 'encrypted_value_9');
INSERT INTO session_data (session_key, encrypted_value) VALUES ('10', 'encrypted_value_10');