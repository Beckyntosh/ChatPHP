CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
appointment_date DATETIME NOT NULL,
appointment_type VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Inserting values
INSERT INTO users (username, password, email) VALUES ('john_doe', '$2y$10$sF.eo1UQ2xgV0mkClD9OUOgVTOKWp.PJy2UtTaoEf/UfYzHSDvlCy', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', '$2y$10$jezZKpQ6T5F5NW0zQ9OqL.DOzzz9SM/zz96f.NjbW53ZJ4CWQkXBq', 'jane.smith@example.com');

INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (1, '2022-09-15 08:30:00', 'Dental Checkup');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (2, '2022-09-20 10:00:00', 'Dental Cleaning');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (1, '2022-09-25 09:45:00', 'Tooth Extraction');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (2, '2022-09-30 11:30:00', 'Dental Checkup');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (1, '2022-10-05 13:15:00', 'Dental Cleaning');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (2, '2022-10-10 15:00:00', 'Tooth Extraction');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (1, '2022-10-15 16:45:00', 'Dental Checkup');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (2, '2022-10-20 18:30:00', 'Dental Cleaning');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (1, '2022-10-25 20:15:00', 'Tooth Extraction');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (2, '2022-10-30 22:00:00', 'Dental Checkup');