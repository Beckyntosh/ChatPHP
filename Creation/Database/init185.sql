CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users_learning_paths (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    user_id INT,
    added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO courses (title, description) VALUES ('Mathematics 101', 'Introduction to basic math principles');
INSERT INTO courses (title, description) VALUES ('Literature Review', 'Understanding different genres of literature');
INSERT INTO courses (title, description) VALUES ('History of Science', 'Exploring key scientific discoveries');
INSERT INTO courses (title, description) VALUES ('Programming Fundamentals', 'Fundamental concepts in programming');
INSERT INTO courses (title, description) VALUES ('Data Analysis Techniques', 'Analyzing and interpreting data');
INSERT INTO courses (title, description) VALUES ('Art Appreciation', 'Exploring various forms of art');
INSERT INTO courses (title, description) VALUES ('Languages for Beginners', 'Learning the basics of different languages');
INSERT INTO courses (title, description) VALUES ('Psychology Basics', 'Introduction to psychological concepts');
INSERT INTO courses (title, description) VALUES ('Environmental Science', 'Studying the environment and ecosystems');
INSERT INTO courses (title, description) VALUES ('Music Theory', 'Understanding the theory behind music');

INSERT INTO users_learning_paths (course_id, user_id) VALUES (1, 1);
INSERT INTO users_learning_paths (course_id, user_id) VALUES (3, 1);
INSERT INTO users_learning_paths (course_id, user_id) VALUES (5, 1);
