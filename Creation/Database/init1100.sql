CREATE TABLE IF NOT EXISTS user_sessions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(256) NOT NULL,
    session_data TEXT NOT NULL,
    access TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_sessions (session_id, session_data) VALUES ('session1', 'encrypted_data_1');
INSERT INTO user_sessions (session_id, session_data) VALUES ('session2', 'encrypted_data_2');
INSERT INTO user_sessions (session_id, session_data) VALUES ('session3', 'encrypted_data_3');
INSERT INTO user_sessions (session_id, session_data) VALUES ('session4', 'encrypted_data_4');
INSERT INTO user_sessions (session_id, session_data) VALUES ('session5', 'encrypted_data_5');
INSERT INTO user_sessions (session_id, session_data) VALUES ('session6', 'encrypted_data_6');
INSERT INTO user_sessions (session_id, session_data) VALUES ('session7', 'encrypted_data_7');
INSERT INTO user_sessions (session_id, session_data) VALUES ('session8', 'encrypted_data_8');
INSERT INTO user_sessions (session_id, session_data) VALUES ('session9', 'encrypted_data_9');
INSERT INTO user_sessions (session_id, session_data) VALUES ('session10', 'encrypted_data_10');
