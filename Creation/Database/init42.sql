CREATE TABLE IF NOT EXISTS Courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    duration INT(10),
    difficulty_level VARCHAR(50),
    instructor_rating DECIMAL(3,2),
    reg_date TIMESTAMP
);

INSERT INTO Courses (course_name, duration, difficulty_level, instructor_rating, reg_date) VALUES 
('Mathematics 101', 24, 'Beginner', 4.5, NOW()),
('Physics for Engineers', 36, 'Intermediate', 4.2, NOW()),
('Introduction to Programming', 20, 'Beginner', 4.8, NOW()),
('Advanced Data Structures', 30, 'Advanced', 4.6, NOW()),
('English Literature', 28, 'Intermediate', 4.3, NOW()),
('Statistics for Social Sciences', 22, 'Intermediate', 4.4, NOW()),
('Digital Marketing Fundamentals', 18, 'Beginner', 4.2, NOW()),
('Psychology 101', 26, 'Intermediate', 4.1, NOW()),
('Art History', 24, 'Beginner', 4.7, NOW()),
('Organic Chemistry Basics', 32, 'Advanced', 4.5, NOW());