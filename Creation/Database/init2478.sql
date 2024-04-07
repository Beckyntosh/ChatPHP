CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    appointment_date DATETIME NOT NULL,
    service VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('JohnDoe', 'password123', 'johndoe@example.com');
INSERT INTO users (username, password, email) VALUES ('AliceSmith', 'alice123', 'alice.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('BobBrown', 'brownie45', 'bob.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('MeganClark', 'megan456', 'megan.clark@example.com');
INSERT INTO users (username, password, email) VALUES ('DavidTaylor', 'davidt789', 'david.taylor@example.com');

INSERT INTO appointments (user_id, appointment_date, service) VALUES (1, '2022-07-15 10:00:00', 'Skin Care Consultation');
INSERT INTO appointments (user_id, appointment_date, service) VALUES (2, '2022-08-20 15:30:00', 'Acne Treatment Session');
INSERT INTO appointments (user_id, appointment_date, service) VALUES (3, '2022-09-10 11:45:00', 'Skin Care Consultation');
INSERT INTO appointments (user_id, appointment_date, service) VALUES (4, '2022-10-05 09:15:00', 'Acne Treatment Session');
INSERT INTO appointments (user_id, appointment_date, service) VALUES (5, '2022-11-12 14:00:00', 'Skin Care Consultation');
