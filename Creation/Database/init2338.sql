CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    event_name VARCHAR(50) NOT NULL,
    event_date DATE,
    reg_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Inserting values into users table
INSERT INTO users (username, password, email, reg_date) VALUES ('john_doe', 'password123', 'john@example.com', NOW());
INSERT INTO users (username, password, email, reg_date) VALUES ('jane_smith', 'pass456', 'jane@example.com', NOW());
INSERT INTO users (username, password, email, reg_date) VALUES ('james_brown', 'brownie', 'james@example.com', NOW());
INSERT INTO users (username, password, email, reg_date) VALUES ('sarah_park', 'park1234', 'sarah@example.com', NOW());
INSERT INTO users (username, password, email, reg_date) VALUES ('michael_green', 'greenM', 'michael@example.com', NOW());

-- Inserting values into events table
INSERT INTO events (user_id, event_name, event_date, reg_date) VALUES (1, 'Webinar A', '2022-10-15', NOW());
INSERT INTO events (user_id, event_name, event_date, reg_date) VALUES (2, 'Workshop B', '2022-11-20', NOW());
INSERT INTO events (user_id, event_name, event_date, reg_date) VALUES (3, 'Conference C', '2023-01-05', NOW());
INSERT INTO events (user_id, event_name, event_date, reg_date) VALUES (4, 'Seminar D', '2023-02-12', NOW());
INSERT INTO events (user_id, event_name, event_date, reg_date) VALUES (5, 'Training E', '2023-03-25', NOW());