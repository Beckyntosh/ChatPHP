CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    appointment_time DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password1');
INSERT INTO users (username, password) VALUES ('jane_smith', 'password2');
INSERT INTO users (username, password) VALUES ('mike_jones', 'password3');
INSERT INTO users (username, password) VALUES ('sarah_brown', 'password4');
INSERT INTO users (username, password) VALUES ('chris_evans', 'password5');

INSERT INTO appointments (user_id, appointment_time) VALUES (1, '2022-10-15 10:00:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (2, '2022-10-16 11:30:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (3, '2022-10-17 13:45:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (4, '2022-10-18 15:15:00');
INSERT INTO appointments (user_id, appointment_time) VALUES (5, '2022-10-19 16:30:00');
