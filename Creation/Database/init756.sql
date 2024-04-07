CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO feedback (user_id, message) VALUES (1, 'This is a sample feedback message 1');
INSERT INTO feedback (user_id, message) VALUES (2, 'This is a sample feedback message 2');
INSERT INTO feedback (user_id, message) VALUES (3, 'This is a sample feedback message 3');
INSERT INTO feedback (user_id, message) VALUES (4, 'This is a sample feedback message 4');
INSERT INTO feedback (user_id, message) VALUES (5, 'This is a sample feedback message 5');
INSERT INTO feedback (user_id, message) VALUES (6, 'This is a sample feedback message 6');
INSERT INTO feedback (user_id, message) VALUES (7, 'This is a sample feedback message 7');
INSERT INTO feedback (user_id, message) VALUES (8, 'This is a sample feedback message 8');
INSERT INTO feedback (user_id, message) VALUES (9, 'This is a sample feedback message 9');
INSERT INTO feedback (user_id, message) VALUES (10, 'This is a sample feedback message 10');