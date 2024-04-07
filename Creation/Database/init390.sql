CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(50) NOT NULL,
course_description TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS enrollment (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
course_id INT(6) UNSIGNED,
enroll_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO users (username, password, email) VALUES ('JohnDoe', 'password123', 'johndoe@example.com');
INSERT INTO users (username, password, email) VALUES ('AliceSmith', 'abc123', 'alice@example.com');
INSERT INTO users (username, password, email) VALUES ('BobJohnson', 'passw0rd', 'bob@example.com');

INSERT INTO courses (course_name, course_description) VALUES ('Introduction to Programming', 'Learn the basics of programming');
INSERT INTO courses (course_name, course_description) VALUES ('Web Development', 'Build websites and web applications');
INSERT INTO courses (course_name, course_description) VALUES ('Data Science', 'Explore data analysis and machine learning');

INSERT INTO enrollment (user_id, course_id) VALUES (1, 1);
INSERT INTO enrollment (user_id, course_id) VALUES (2, 2);
INSERT INTO enrollment (user_id, course_id) VALUES (3, 3);
