CREATE TABLE IF NOT EXISTS course_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  course_name VARCHAR(50) NOT NULL,
  user_email VARCHAR(50),
  rating INT(1) NOT NULL,
  feedback TEXT,
  reg_date TIMESTAMP
);

INSERT INTO course_feedback (course_name, user_email, rating, feedback) VALUES
('Mathematics 101', 'john@example.com', 4, 'Great course, learned a lot'),
('History 201', 'amy@example.com', 5, 'Fantastic instructor, highly recommend'),
('Programming Fundamentals', 'jane@example.com', 3, 'Good content but could use more practice exercises'),
('Literature Appreciation', 'michael@example.com', 2, 'Not what I expected, too theoretical'),
('Art History', 'emily@example.com', 4, 'Enjoyed the class and discussions'),
('Physics for Beginners', 'david@example.com', 5, 'Amazing course, made complex topics easy to understand'),
('Chemistry Basics', 'sarah@example.com', 1, 'Poorly organized, difficult to follow'),
('Music Theory', 'peter@example.com', 3, 'Decent course but lacked interactive elements'),
('Psychology Essentials', 'lisa@example.com', 4, 'Informative and engaging lectures'),
('Geography Exploration', 'kevin@example.com', 5, 'Impressed by the depth of course content');
