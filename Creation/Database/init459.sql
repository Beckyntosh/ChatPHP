CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    grade FLOAT NOT NULL,
    credit INT NOT NULL
);

INSERT INTO courses (course_name, grade, credit) VALUES
('Mathematics', 3.5, 3),
('English', 4.0, 4),
('Physics', 3.8, 5),
('Biology', 3.9, 4),
('History', 3.0, 3),
('Chemistry', 3.7, 4),
('Computer Science', 4.0, 4),
('Art', 3.2, 2),
('Economics', 3.6, 3),
('Geography', 3.4, 3);
