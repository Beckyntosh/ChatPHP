CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
event_name VARCHAR(50) NOT NULL,
description TEXT,
event_date DATE,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'abc123', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('test_user', 'testpass', 'test.user@example.com');
INSERT INTO users (username, password, email) VALUES ('admin', 'adminpass', 'admin@example.com');
INSERT INTO users (username, password, email) VALUES ('new_user', 'newpass', 'new.user@example.com');

INSERT INTO events (user_id, event_name, description, event_date) VALUES (1, 'Webinar 1', 'Introduction to Vitamins', '2022-10-15');
INSERT INTO events (user_id, event_name, description, event_date) VALUES (2, 'Webinar 2', 'Benefits of Vitamin C', '2022-11-02');
INSERT INTO events (user_id, event_name, description, event_date) VALUES (3, 'Webinar 3', 'Vitamin D and Bone Health', '2022-12-10');
INSERT INTO events (user_id, event_name, description, event_date) VALUES (1, 'Webinar 4', 'Importance of Vitamin A', '2023-02-05');
INSERT INTO events (user_id, event_name, description, event_date) VALUES (4, 'Webinar 5', 'Vitamin B Complex', '2023-03-20');