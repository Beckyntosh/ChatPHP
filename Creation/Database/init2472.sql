CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(64) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  appointment_datetime DATETIME NOT NULL,
  appointment_type VARCHAR(50),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', '$2y$10$UdLQFaypFaLFqoWu7XIvw.ZA.AOzx/ZVrj2r0Q5Z8VcuM1lXDnX/m', 'john@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', '$2y$10$lMjH63.5DpcaRC3fMgRUCen2zCkcmR2jqmim8Q8cq6Gcr2hx9orSu', 'jane@example.com');
INSERT INTO users (username, password, email) VALUES ('william_brown', '$2y$10$pm89l4CxclWC7IGx1sJJbOf75ykCrY6isz2nzomwe6fh8FfIsVMaq', 'william@example.com');
INSERT INTO users (username, password, email) VALUES ('laura_jones', '$2y$10$l1iJLpZfa3T.MDOuYmUuh.RlxH8BmaaDycmE8UcW/tRLktMSW3h0W', 'laura@example.com');
INSERT INTO users (username, password, email) VALUES ('michael_white', '$2y$10$hrBtoIiJmTpQUs0QIwJz/OSRE4KmqLWkT6EEnK0JAKiGJfGevbUUe', 'michael@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_miller', '$2y$10$tv8498MyI9fQiVN5xiauAOgVcYBx3Jkn5eDy3RHf.bkva61r.ru.U', 'sarah@example.com');
INSERT INTO users (username, password, email) VALUES ('jack_robinson', '$2y$10$KyHbcDsETxrk5cZt8s2d8uzfRbWj9cOP7c92Wl2qVjVoa.aQaV/QW', 'jack@example.com');
INSERT INTO users (username, password, email) VALUES ('amy_long', '$2y$10$Dk6X4n1amdWXYCev0YYVVOL4iZiu4N/tcxKBek/pl7r579z6nmgH6', 'amy@example.com');
INSERT INTO users (username, password, email) VALUES ('chris_tyler', '$2y$10$4FrZN.Fvz0IAdgopuoMkseujG4QM8zNQcG4JziZHcjVijorCXAeGm', 'chris@example.com');
INSERT INTO users (username, password, email) VALUES ('linda_scott', '$2y$10$OdvywWVyNWT2GjN2lNqgu.Z42RcVz3Z5quUvB2cI8KA6n.LqkIP9C', 'linda@example.com');

INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (1, '2023-01-15 10:00:00', 'Dental Checkup');
INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (2, '2023-02-20 15:30:00', 'Eye Exam');
INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (3, '2023-03-10 09:45:00', 'Physical Therapy');
INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (4, '2023-04-05 11:15:00', 'Dermatology Consultation');
INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (5, '2023-05-18 14:00:00', 'Nutrition Counseling');
INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (6, '2023-06-07 08:30:00', 'Chiropractic Adjustment');
INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (7, '2023-07-22 13:45:00', 'Mental Health Therapy');
INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (8, '2023-08-09 10:30:00', 'Acupuncture Session');
INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (9, '2023-09-14 16:20:00', 'Massage Therapy');
INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES (10, '2023-10-27 12:00:00', 'Allergy Testing');