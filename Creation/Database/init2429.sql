CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
preference VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO preferences (user_id, preference) VALUES (1, 'Makeup Style: calm');

INSERT INTO users (username, password, email) VALUES ('jane_smith', 'qwerty', 'jane.smith@example.com');
INSERT INTO preferences (user_id, preference) VALUES (2, 'Makeup Style: bold');

INSERT INTO users (username, password, email) VALUES ('alice_wonderland', 'alice123', 'alice.wonderland@example.com');
INSERT INTO preferences (user_id, preference) VALUES (3, 'Makeup Style: natural');

INSERT INTO users (username, password, email) VALUES ('bob_marley', 'bob123', 'bob.marley@example.com');
INSERT INTO preferences (user_id, preference) VALUES (4, 'Makeup Style: dramatic');

INSERT INTO users (username, password, email) VALUES ('emma_watson', 'emma345', 'emma.watson@example.com');
INSERT INTO preferences (user_id, preference) VALUES (5, 'Makeup Style: romantic');

INSERT INTO users (username, password, email) VALUES ('peter_pan', 'neverland', 'peter.pan@example.com');
INSERT INTO preferences (user_id, preference) VALUES (6, 'Makeup Style: natural');

INSERT INTO users (username, password, email) VALUES ('mary_poppins', 'supercalifragilisticexpialidocious', 'mary.poppins@example.com');
INSERT INTO preferences (user_id, preference) VALUES (7, 'Makeup Style: bold');

INSERT INTO users (username, password, email) VALUES ('harry_potter', 'gryffindor', 'harry.potter@example.com');
INSERT INTO preferences (user_id, preference) VALUES (8, 'Makeup Style: dramatic');

INSERT INTO users (username, password, email) VALUES ('cinderella', 'glassslipper', 'cinderella@example.com');
INSERT INTO preferences (user_id, preference) VALUES (9, 'Makeup Style: romantic');

INSERT INTO users (username, password, email) VALUES ('aladdin', 'genie', 'aladdin@example.com');
INSERT INTO preferences (user_id, preference) VALUES (10, 'Makeup Style: calm');
