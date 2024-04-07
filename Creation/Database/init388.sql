CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    course_name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password) VALUES ('JohnDoe', 'password1');
INSERT INTO users (username, password) VALUES ('JaneSmith', 'password2');
INSERT INTO users (username, password) VALUES ('AliceJohnson', 'password3');
INSERT INTO users (username, password) VALUES ('RobertBrown', 'password4');
INSERT INTO users (username, password) VALUES ('SarahLee', 'password5');

INSERT INTO courses (user_id, course_name) VALUES (1, 'Mathematics');
INSERT INTO courses (user_id, course_name) VALUES (2, 'History');
INSERT INTO courses (user_id, course_name) VALUES (3, 'Computer Science');
INSERT INTO courses (user_id, course_name) VALUES (4, 'English Literature');
INSERT INTO courses (user_id, course_name) VALUES (5, 'Physics');