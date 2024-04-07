CREATE TABLE IF NOT EXISTS course_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(50) NOT NULL,
user_name VARCHAR(50),
rating INT(1),
feedback TEXT,
reg_date TIMESTAMP
);

INSERT INTO course_feedback (course_name, user_name, rating, feedback)
VALUES ('Mathematics', 'John Doe', 5, 'Great course, very informative.'),
('History', 'Jane Smith', 4, 'Enjoyed learning about different historical events.'),
('Science', 'Alice Johnson', 3, 'Decent course, could use more interactive content.'),
('English', 'Bob Brown', 5, 'Fantastic course, improved my language skills.'),
('Physics', 'Sarah Green', 4, 'Interesting topics, clear explanations.'),
('Geography', 'Michael Davis', 2, 'Lacking in engaging materials.'),
('Art', 'Emily Wilson', 4, 'Creative course, learned a lot about different art styles.'),
('Biology', 'Sam Taylor', 3, 'Informative but a bit dry at times.'),
('Computer Science', 'Chris Miller', 5, 'Amazing course, practical assignments helped a lot.'),
('Music', 'Laura Thompson', 4, 'Fun and engaging course, enjoyed the music theory lessons.');
