CREATE TABLE IF NOT EXISTS friends (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    friend_id INT,
    status ENUM('pending', 'confirmed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO friends (user_id, friend_id, status) VALUES (1, 2, 'pending');
INSERT INTO friends (user_id, friend_id, status) VALUES (1, 3, 'pending');
INSERT INTO friends (user_id, friend_id, status) VALUES (1, 4, 'pending');
INSERT INTO friends (user_id, friend_id, status) VALUES (2, 1, 'pending');
INSERT INTO friends (user_id, friend_id, status) VALUES (3, 1, 'pending');
INSERT INTO friends (user_id, friend_id, status) VALUES (4, 1, 'pending');
INSERT INTO friends (user_id, friend_id, status) VALUES (2, 3, 'pending');
INSERT INTO friends (user_id, friend_id, status) VALUES (3, 2, 'pending');
INSERT INTO friends (user_id, friend_id, status) VALUES (2, 4, 'pending');
INSERT INTO friends (user_id, friend_id, status) VALUES (4, 2, 'pending');
