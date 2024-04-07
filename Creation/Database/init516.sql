CREATE TABLE IF NOT EXISTS messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender_id INT(6) UNSIGNED,
    receiver_id INT(6) UNSIGNED,
    message TEXT,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO messages (sender_id, receiver_id, message) VALUES (1, 2, "This is a test message 1");
INSERT INTO messages (sender_id, receiver_id, message) VALUES (2, 1, "This is a test message 2");
INSERT INTO messages (sender_id, receiver_id, message) VALUES (3, 1, "This is a test message 3");
INSERT INTO messages (sender_id, receiver_id, message) VALUES (1, 3, "This is a test message 4");
INSERT INTO messages (sender_id, receiver_id, message) VALUES (2, 3, "This is a test message 5");
INSERT INTO messages (sender_id, receiver_id, message) VALUES (3, 2, "This is a test message 6");
INSERT INTO messages (sender_id, receiver_id, message) VALUES (1, 2, "This is a test message 7");
INSERT INTO messages (sender_id, receiver_id, message) VALUES (2, 3, "This is a test message 8");
INSERT INTO messages (sender_id, receiver_id, message) VALUES (3, 1, "This is a test message 9");
INSERT INTO messages (sender_id, receiver_id, message) VALUES (1, 3, "This is a test message 10");
