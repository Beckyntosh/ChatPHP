CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(60) NOT NULL,
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

INSERT INTO users (username, password, email) VALUES ('JohnDoe', 'hashedpassword1', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('JaneSmith', 'hashedpassword2', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('AliceBrown', 'hashedpassword3', 'alice.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('BobWhite', 'hashedpassword4', 'bob.white@example.com');

INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (1, '2022-10-15 10:00:00', 'Garden Consultation');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (2, '2022-10-20 13:30:00', 'Tool Maintenance');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (3, '2022-11-05 09:15:00', 'Garden Consultation');
INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES (4, '2022-11-10 11:45:00', 'Tool Maintenance');
