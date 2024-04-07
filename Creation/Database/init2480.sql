CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

-- Create appointments table
CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    appointment_date DATETIME NOT NULL,
    service VARCHAR(50) NOT NULL,
    FOREIGN KEY (userid) REFERENCES users(id),
    reg_date TIMESTAMP
);

-- Insert values into users table
INSERT INTO users (username, password, email) VALUES ('User1', 'password1', 'user1@example.com');
INSERT INTO users (username, password, email) VALUES ('User2', 'password2', 'user2@example.com');
INSERT INTO users (username, password, email) VALUES ('User3', 'password3', 'user3@example.com');
INSERT INTO users (username, password, email) VALUES ('User4', 'password4', 'user4@example.com');
INSERT INTO users (username, password, email) VALUES ('User5', 'password5', 'user5@example.com');

-- Insert values into appointments table
INSERT INTO appointments (userid, appointment_date, service) VALUES (1, '2022-11-21 10:00:00', 'Jewelry Repair');
INSERT INTO appointments (userid, appointment_date, service) VALUES (2, '2022-11-22 14:30:00', 'Custom Design');
INSERT INTO appointments (userid, appointment_date, service) VALUES (3, '2022-11-23 11:00:00', 'Ring Resizing');
INSERT INTO appointments (userid, appointment_date, service) VALUES (4, '2022-11-24 13:45:00', 'Jewelry Repair');
INSERT INTO appointments (userid, appointment_date, service) VALUES (5, '2022-11-25 09:30:00', 'Custom Design');
