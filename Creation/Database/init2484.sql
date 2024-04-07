CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
appointment_date DATETIME,
type VARCHAR(100),
INDEX fk_user_id (user_id),
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'qwerty456', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('alice_kim', 'pass1234', 'alice.kim@example.com');
INSERT INTO users (username, password, email) VALUES ('bob_jones', 'securepwd', 'bob.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('sara_adams', 'p@ssw0rd', 'sara.adams@example.com');
INSERT INTO users (username, password, email) VALUES ('mike_brown', 'letmein987', 'mike.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_wilson', 'password321', 'emily.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('alex_turner', 'abc123', 'alex.turner@example.com');
INSERT INTO users (username, password, email) VALUES ('amy_clark', 'secret1', 'amy.clark@example.com');
INSERT INTO users (username, password, email) VALUES ('david_miller', 'securepassword', 'david.miller@example.com');

INSERT INTO appointments (user_id, appointment_date, type) VALUES (1, '2022-12-15 10:00:00', 'Dental Checkup');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (2, '2022-12-18 15:30:00', 'Eye Examination');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (3, '2022-12-20 09:45:00', 'Dermatology Consultation');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (4, '2022-12-21 11:20:00', 'Physical Therapy Session');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (5, '2022-12-23 14:00:00', 'Nutrition Counseling');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (6, '2022-12-24 10:30:00', 'Cardiology Checkup');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (7, '2022-12-26 13:45:00', 'Neurology Consultation');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (8, '2022-12-27 08:15:00', 'Orthopedic Evaluation');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (9, '2022-12-30 16:00:00', 'Psychiatry Session');
INSERT INTO appointments (user_id, appointment_date, type) VALUES (10, '2022-12-31 12:00:00', 'Gastroenterology Consultation');
