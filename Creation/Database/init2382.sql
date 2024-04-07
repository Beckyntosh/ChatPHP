CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255),
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(30) NOT NULL,
user_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email, password) VALUES ('JohnDoe', 'johndoe@example.com', '$2y$10$HK0/KUMfSjJFs6frD2PkJuoHN4GUoCgqLdBVrc2Tp4aZBqje97Ysm');
INSERT INTO users (username, email, password) VALUES ('JaneSmith', 'janesmith@example.com', '$2y$10$XJ7H/a0/SCao6gO/VMq4Q..74AghtjD/71T9mbsFfmHqTi71ksB0S');
INSERT INTO users (username, email, password) VALUES ('AliceBrown', 'alicebrown@example.com', '$2y$10$npTMMdx4u5VNaqH38ozhWud3TqCpgCkpab.Y4/Fo.lar7tUfJXS82');
INSERT INTO users (username, email, password) VALUES ('BobWhite', 'bobwhite@example.com', '$2y$10$I7JUJu5c2b17Dx4sL2.Cy.ekJPF7GT0hAoaXIcNd1nBdP3SMHvblO');
INSERT INTO users (username, email, password) VALUES ('EveGreen', 'evegreen@example.com', '$2y$10$ZoPs6NpA5g3HzVQyCjiMQe2iI4jFLvg/ZRPs2hrYO7wfYp3r/wXC6');

INSERT INTO courses (course_name, user_id) VALUES ('Coding in PHP', 1);
INSERT INTO courses (course_name, user_id) VALUES ('Web Development', 2);
INSERT INTO courses (course_name, user_id) VALUES ('Data Science', 3);
INSERT INTO courses (course_name, user_id) VALUES ('Mobile App Development', 4);
INSERT INTO courses (course_name, user_id) VALUES ('Cybersecurity', 5);
