CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE IF NOT EXISTS bookmarks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO courses (title, description) VALUES ('Course 1', 'Description 1');
INSERT INTO courses (title, description) VALUES ('Course 2', 'Description 2');
INSERT INTO courses (title, description) VALUES ('Course 3', 'Description 3');
INSERT INTO courses (title, description) VALUES ('Course 4', 'Description 4');
INSERT INTO courses (title, description) VALUES ('Course 5', 'Description 5');
INSERT INTO courses (title, description) VALUES ('Course 6', 'Description 6');
INSERT INTO courses (title, description) VALUES ('Course 7', 'Description 7');
INSERT INTO courses (title, description) VALUES ('Course 8', 'Description 8');
INSERT INTO courses (title, description) VALUES ('Course 9', 'Description 9');
INSERT INTO courses (title, description) VALUES ('Course 10', 'Description 10');