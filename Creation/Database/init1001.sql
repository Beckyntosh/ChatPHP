CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id INT(6) UNSIGNED,
    rating INT(1) NOT NULL,
    comment TEXT,
    submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO courses (name, description) VALUES 
("Introduction to Python Programming", "This course covers the basics of Python programming language"),
("Web Development Fundamentals", "Learn the essentials of web development from scratch"),
("Machine Learning for Beginners", "Introduction to machine learning algorithms and techniques"),
("Graphic Design Principles", "Explore the fundamental principles of graphic design"),
("Mobile App Development Tutorial", "Learn to create mobile apps for Android and iOS platforms");

INSERT INTO feedback (course_id, rating, comment) VALUES
(1, 4, "Great course, but could include more exercises"),
(2, 5, "Excellent content, very well explained"),
(3, 3, "Found it a bit challenging, but overall good introduction to ML"),
(4, 4, "Enjoyed the course, would love more projects to work on"),
(5, 5, "In-depth explanations and practical examples, highly recommend");