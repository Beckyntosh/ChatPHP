CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255)
);

CREATE TABLE messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fromUser INT,
    toUser INT,
    message TEXT,
    FOREIGN KEY (fromUser) REFERENCES users(id),
    FOREIGN KEY (toUser) REFERENCES users(id)
);

INSERT INTO users (username) VALUES ('Alice'), ('Bob'), ('Charlie'), ('David'), ('Eve'), ('Frank'), ('Gina'), ('Hank'), ('Ivy'), ('Jack');
INSERT INTO messages (fromUser, toUser, message) VALUES (1, 2, 'Hello Bob!'), (2, 1, 'Hi Alice!'), (3, 4, 'Hey David'), (5, 6, 'How are you Frank?'), (7, 8, 'Good morning Hank!'), (9, 10, 'Have you seen Jack?');
