CREATE TABLE IF NOT EXISTS messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(30) NOT NULL,
    receiver VARCHAR(30) NOT NULL,
    message TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO messages (sender, receiver, message) VALUES ('Alice', 'Bob', 'Encrypted message 1');
INSERT INTO messages (sender, receiver, message) VALUES ('Bob', 'Alice', 'Encrypted message 2');
INSERT INTO messages (sender, receiver, message) VALUES ('Charlie', 'Alice', 'Encrypted message 3');
INSERT INTO messages (sender, receiver, message) VALUES ('Alice', 'Charlie', 'Encrypted message 4');
INSERT INTO messages (sender, receiver, message) VALUES ('Dave', 'Eve', 'Encrypted message 5');
INSERT INTO messages (sender, receiver, message) VALUES ('Eve', 'Dave', 'Encrypted message 6');
INSERT INTO messages (sender, receiver, message) VALUES ('Frank', 'Grace', 'Encrypted message 7');
INSERT INTO messages (sender, receiver, message) VALUES ('Grace', 'Frank', 'Encrypted message 8');
INSERT INTO messages (sender, receiver, message) VALUES ('Harry', 'Ivy', 'Encrypted message 9');
INSERT INTO messages (sender, receiver, message) VALUES ('Ivy', 'Harry', 'Encrypted message 10');
