CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    difficulty VARCHAR(50) NOT NULL
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    rating INT NOT NULL,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO courses (name, duration, difficulty) VALUES
('Web Development Bootcamp', 6, 'intermediate'),
('Data Science Fundamentals', 4, 'advanced'),
('Graphic Design Basics', 2, 'beginner'),
('Mobile App Development', 5, 'intermediate'),
('Digital Marketing Masterclass', 3, 'advanced'),
('Photography Essentials', 3, 'beginner'),
('UX/UI Design Principles', 4, 'intermediate'),
('Machine Learning Fundamentals', 6, 'advanced'),
('Music Production Workshop', 2, 'beginner'),
('Creative Writing for Beginners', 3, 'intermediate');

INSERT INTO reviews (course_id, rating) VALUES
(1, 4),
(2, 5),
(3, 3),
(4, 4),
(5, 5),
(6, 2),
(7, 4),
(8, 5),
(9, 3),
(10, 4);
