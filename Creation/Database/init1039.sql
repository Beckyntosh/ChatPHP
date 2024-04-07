CREATE TABLE IF NOT EXISTS user_session (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
session_data TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_1');
INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_2');
INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_3');
INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_4');
INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_5');
INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_6');
INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_7');
INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_8');
INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_9');
INSERT INTO user_session (session_data) VALUES ('encrypted_data_here_10');
