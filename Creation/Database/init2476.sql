CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(40) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
    appointment_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    appointment_time DATETIME NOT NULL,
    appointment_type VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'secret456', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('mike_jones', 'secure789', 'mike.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_parker', 'topsecret321', 'sarah.parker@example.com');
INSERT INTO users (username, password, email) VALUES ('alex_wilson', 'qwerty789', 'alex.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('linda_brown', 'letmein123', 'linda.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('sam_carter', 'mypassword', 'sam.carter@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_adams', 'password456', 'emily.adams@example.com');
INSERT INTO users (username, password, email) VALUES ('chris_miller', 'securepass', 'chris.miller@example.com');
INSERT INTO users (username, password, email) VALUES ('jessica_taylor', 'pass1234', 'jessica.taylor@example.com');

INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (1, '2022-12-31 09:00:00', 'Dental Checkup');
INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (2, '2022-11-15 14:30:00', 'Eye Exam');
INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (3, '2023-01-20 11:00:00', 'General Checkup');
INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (4, '2022-10-10 10:45:00', 'Vaccination');
INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (5, '2022-11-05 08:30:00', 'Physical Therapy');
INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (6, '2023-02-18 15:15:00', 'Counseling Session');
INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (7, '2022-12-05 13:00:00', 'Blood Test');
INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (8, '2022-09-25 09:45:00', 'Ultrasound');
INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (9, '2023-03-10 17:30:00', 'Dermatology Consultation');
INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (10, '2022-10-28 12:30:00', 'X-ray Examination');
