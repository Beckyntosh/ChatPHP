CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    appointment_date TIMESTAMP NOT NULL,
    type VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


INSERT INTO users (username, password, email) VALUES ('john_doe', 'password1', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'password2', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('mike_jones', 'password3', 'mike.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_jackson', 'password4', 'sarah.jackson@example.com');
INSERT INTO users (username, password, email) VALUES ('chris_adams', 'password5', 'chris.adams@example.com');

INSERT INTO appointments (user_id, appointment_date, type) VALUES (1, '2022-12-01 14:00:00', 'Dental');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (2, '2022-11-15 10:30:00', 'Orthodontic');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (3, '2022-12-05 09:00:00', 'Cleaning');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (4, '2022-11-20 15:45:00', 'Dental');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (5, '2022-11-28 11:30:00', 'Orthodontic');
