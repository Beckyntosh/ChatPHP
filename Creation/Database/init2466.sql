CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

-- Create appointments table
CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    appointment_time DATETIME NOT NULL,
    created_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert sample data into users table
INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'hello123');
INSERT INTO users (username, password) VALUES ('mike_jones', 'securepwd');

-- Insert sample data into appointments table
INSERT INTO appointments (user_id, appointment_time) VALUES (1, '2022-07-15 10:00:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (2, '2022-07-16 14:30:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (3, '2022-07-17 11:15:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (1, '2022-07-18 09:00:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (2, '2022-07-19 16:45:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (3, '2022-07-20 12:30:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (1, '2022-07-21 08:30:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (2, '2022-07-22 15:00:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (3, '2022-07-23 10:45:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (1, '2022-07-24 07:45:00');
