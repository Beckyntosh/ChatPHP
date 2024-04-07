CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT,
    receiver_id INT,
    message TEXT,
    FOREIGN KEY (sender_id) REFERENCES users(id),
    FOREIGN KEY (receiver_id) REFERENCES users(id)
);

INSERT INTO users (username) VALUES ('Alice'), ('Bob'), ('Charlie'), ('David'), ('Eve'), ('Frank'), ('Grace'), ('Harry'), ('Ivy'), ('Jack');
INSERT INTO messages (sender_id, receiver_id, message) VALUES 
((SELECT id FROM users WHERE username = 'Alice'), (SELECT id FROM users WHERE username = 'Bob'), 'SGVsbG8gV29ybGQgMTIz'), 
((SELECT id FROM users WHERE username = 'Charlie'), (SELECT id FROM users WHERE username = 'David'), 'U29ycnksIEkgY2Fubm90IGhlbHAgd2l0aCBhIG51bWJlciE='), 
((SELECT id FROM users WHERE username = 'Eve'), (SELECT id FROM users WHERE username = 'Frank'), 'RXZlIGhhY2tpbmcgaG93IGRvIHlvdSE='), 
((SELECT id FROM users WHERE username = 'Grace'), (SELECT id FROM users WHERE username = 'Harry'), 'R29vZCBoYXZlIHN0cmVldCBvZiBlYXJseSE='), 
((SELECT id FROM users WHERE username = 'Ivy'), (SELECT id FROM users WHERE username = 'Jack'), 'SXZ5LCBob3cgd2lsbCBoZWFyZCE=');
