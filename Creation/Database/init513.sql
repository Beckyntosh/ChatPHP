CREATE TABLE IF NOT EXISTS user_sessions (
    session_id VARCHAR(255) NOT NULL PRIMARY KEY,
    session_data TEXT NOT NULL,
    session_expiry INT(11) NOT NULL
);

INSERT INTO user_sessions (session_id, session_data, session_expiry) VALUES 
('session_1', 'encrypted_data_1', 1634010000),
('session_2', 'encrypted_data_2', 1634010000),
('session_3', 'encrypted_data_3', 1634010000),
('session_4', 'encrypted_data_4', 1634010000),
('session_5', 'encrypted_data_5', 1635010000),
('session_6', 'encrypted_data_6', 1635010000),
('session_7', 'encrypted_data_7', 1635010000),
('session_8', 'encrypted_data_8', 1635010000),
('session_9', 'encrypted_data_9', 1636010000),
('session_10', 'encrypted_data_10', 1636010000);
