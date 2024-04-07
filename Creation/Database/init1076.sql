CREATE TABLE IF NOT EXISTS course_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    learner_name VARCHAR(255),
    feedback TEXT,
    feedback_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('Introduction to Python', 'Alice', 'Great course! Learned a lot.');
INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('Web Development Fundamentals', 'Bob', 'Excellent content and explanations.');
INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('Machine Learning Basics', 'Charlie', 'Awesome course, very informative.');
INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('Data Visualization Techniques', 'David', 'Really enjoyed the visualizations in this course.');
INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('JavaScript Essentials', 'Eve', 'Highly recommend this course for beginners.');
INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('Database Management Systems', 'Frank', 'Well-structured content and examples.');
INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('Cybersecurity Fundamentals', 'Grace', 'Important information presented in an engaging way.');
INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('Mobile App Development', 'Henry', 'Practical course with hands-on projects.');
INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('Artificial Intelligence Concepts', 'Ivy', 'Fascinating subject, well taught.');
INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('UI/UX Design Principles', 'Jack', 'Helped me understand the principles of design.');

