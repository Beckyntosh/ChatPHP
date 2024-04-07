CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create appointments table
CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
appointment_date DATETIME NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert values into users table
INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'pass456', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('admin', 'adminpass', 'admin@example.com');
INSERT INTO users (username, password, email) VALUES ('test_user', 'test123', 'test@example.com');
INSERT INTO users (username, password, email) VALUES ('alice', 'p@ssw0rd', 'alice@example.com');
INSERT INTO users (username, password, email) VALUES ('bob', 'bob_pass', 'bob@example.com');
INSERT INTO users (username, password, email) VALUES ('david', 'davidpass', 'david@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah', 'pass4321', 'sarah@example.com');
INSERT INTO users (username, password, email) VALUES ('sam', 's@mpass', 'sam@example.com');
INSERT INTO users (username, password, email) VALUES ('lisa', 'lisa1234', 'lisa@example.com');

-- Insert values into appointments table
INSERT INTO appointments (user_id, appointment_date) VALUES (1, '2023-10-15 09:00:00');
INSERT INTO appointments (user_id, appointment_date) VALUES (2, '2023-11-20 10:30:00');
INSERT INTO appointments (user_id, appointment_date) VALUES (3, '2023-12-05 14:00:00');
INSERT INTO appointments (user_id, appointment_date) VALUES (4, '2024-01-10 11:15:00');
INSERT INTO appointments (user_id, appointment_date) VALUES (5, '2024-02-18 16:45:00');
INSERT INTO appointments (user_id, appointment_date) VALUES (6, '2024-03-22 08:30:00');
INSERT INTO appointments (user_id, appointment_date) VALUES (7, '2024-04-29 13:45:00');
INSERT INTO appointments (user_id, appointment_date) VALUES (8, '2024-05-07 15:00:00');
INSERT INTO appointments (user_id, appointment_date) VALUES (9, '2024-06-15 17:30:00');
INSERT INTO appointments (user_id, appointment_date) VALUES (10, '2024-07-20 10:00:00');