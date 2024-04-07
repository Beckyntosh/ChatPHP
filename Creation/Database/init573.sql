CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT,
    receiver_id INT,
    sender_id INT
);

INSERT INTO users (message, receiver_id, sender_id) VALUES ('Hello', 1, 2);
INSERT INTO users (message, receiver_id, sender_id) VALUES ('How are you?', 2, 3);
INSERT INTO users (message, receiver_id, sender_id) VALUES ('I am good, thank you', 3, 1);
INSERT INTO users (message, receiver_id, sender_id) VALUES ('Meeting tomorrow at 10am', 1, 2);
INSERT INTO users (message, receiver_id, sender_id) VALUES ('Remember to bring the documents', 2, 1);
INSERT INTO users (message, receiver_id, sender_id) VALUES ('Sure, I will bring them', 1, 2);
INSERT INTO users (message, receiver_id, sender_id) VALUES ('Dont forget!', 2, 1);
INSERT INTO users (message, receiver_id, sender_id) VALUES ('Ok, I wont forget', 1, 2);
INSERT INTO users (message, receiver_id, sender_id) VALUES ('See you soon', 2, 1);
INSERT INTO users (message, receiver_id, sender_id) VALUES ('Looking forward to it', 1, 2);
