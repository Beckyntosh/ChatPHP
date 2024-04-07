CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED,
    preference_type VARCHAR(50) NOT NULL,
    preference_value VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'pass123', 'john@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'abc456', 'jane@example.com');
INSERT INTO users (username, password, email) VALUES ('test_user', 'testpass', 'test@example.com');

INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (1, 'category', 'Dogs');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (1, 'category', 'Cats');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (2, 'category', 'Fish');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (2, 'category', 'Birds');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (3, 'category', 'Cats');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (3, 'category', 'Dogs');
