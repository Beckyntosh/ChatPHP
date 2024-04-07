CREATE TABLE IF NOT EXISTS user_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    encrypted_message TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_feedback (encrypted_message) VALUES 
    ('encrypted_message_1'),
    ('encrypted_message_2'),
    ('encrypted_message_3'),
    ('encrypted_message_4'),
    ('encrypted_message_5'),
    ('encrypted_message_6'),
    ('encrypted_message_7'),
    ('encrypted_message_8'),
    ('encrypted_message_9'),
    ('encrypted_message_10');
