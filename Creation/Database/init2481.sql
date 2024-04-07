CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS appointments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  appointment_date DATETIME NOT NULL,
  description VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'pass456', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('will_89', 'willpass', 'william@example.com');
INSERT INTO users (username, password, email) VALUES ('emily10', 'emilypass', 'emily@test.com');
INSERT INTO users (username, password, email) VALUES ('robert_j', 'p@ssw0rd', 'robert.j@example.com');
INSERT INTO users (username, password, email) VALUES ('lucy_m', 'password2021', 'lucy.m@example.com');
INSERT INTO users (username, password, email) VALUES ('alex123', 'securepass', 'alex@test.com');
INSERT INTO users (username, password, email) VALUES ('amanda19', 'amandapass', 'amanda@example.com');
INSERT INTO users (username, password, email) VALUES ('eddie87', 'coolpass', 'eddie@example.com');
INSERT INTO users (username, password, email) VALUES ('sara89', 'sara_pass', 'sara@test.com');

INSERT INTO appointments (user_id, appointment_date, description) VALUES (1, '2022-04-20 10:30:00', 'Check-up');
INSERT INTO appointments (user_id, appointment_date, description) VALUES (2, '2022-04-18 14:15:00', 'Tooth Extraction');
INSERT INTO appointments (user_id, appointment_date, description) VALUES (3, '2022-04-25 11:00:00', 'Root Canal Treatment');
INSERT INTO appointments (user_id, appointment_date, description) VALUES (4, '2022-05-05 09:45:00', 'Teeth Cleaning');
INSERT INTO appointments (user_id, appointment_date, description) VALUES (5, '2022-05-10 13:30:00', 'Orthodontic Consultation');
INSERT INTO appointments (user_id, appointment_date, description) VALUES (6, '2022-05-15 16:00:00', 'Cavity Filling');
INSERT INTO appointments (user_id, appointment_date, description) VALUES (7, '2022-05-20 10:00:00', 'Dental Implant');
INSERT INTO appointments (user_id, appointment_date, description) VALUES (8, '2022-05-25 15:45:00', 'X-Ray Scan');
INSERT INTO appointments (user_id, appointment_date, description) VALUES (9, '2022-06-02 08:30:00', 'Dental Crown Installation');
INSERT INTO appointments (user_id, appointment_date, description) VALUES (10, '2022-06-08 11:30:00', 'Emergency Toothache');
