CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    duration INT(10),
    difficulty_level VARCHAR(30),
    instructor_rating INT(2),
    reg_date TIMESTAMP
);

INSERT INTO courses (title, duration, difficulty_level, instructor_rating, reg_date) VALUES 
('Mathematics Basics', 2, 'Beginner', 4, CURRENT_TIMESTAMP),
('Python Programming', 4, 'Intermediate', 3, CURRENT_TIMESTAMP),
('Art History', 1, 'Beginner', 5, CURRENT_TIMESTAMP),
('Data Science Fundamentals', 5, 'Advanced', 4, CURRENT_TIMESTAMP),
('Spanish Language Course', 3, 'Intermediate', 4, CURRENT_TIMESTAMP),
('Photography Masterclass', 4, 'Advanced', 5, CURRENT_TIMESTAMP),
('Introduction to Psychology', 2, 'Beginner', 3, CURRENT_TIMESTAMP),
('Digital Marketing Essentials', 3, 'Intermediate', 4, CURRENT_TIMESTAMP),
('Fitness Training Program', 2, 'Beginner', 4, CURRENT_TIMESTAMP),
('Web Development Bootcamp', 6, 'Advanced', 5, CURRENT_TIMESTAMP);
