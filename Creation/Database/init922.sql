CREATE TABLE IF NOT EXISTS course_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    course_name VARCHAR(255) NOT NULL, 
    learner_name VARCHAR(255), 
    rating INT(1), 
    feedback TEXT,
    reg_date TIMESTAMP
);

INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('Mathematics 101', 'John Doe', 4, 'Great course, very informative');
INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('Science 202', 'Jane Smith', 5, 'Excellent teacher, enjoyed every class');
INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('History 303', 'Michael Johnson', 3, 'Interesting content but pacing was a bit fast');
INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('Art Appreciation', 'Sarah Lee', 5, 'Absolutely loved the instructor and material');
INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('Programming Basics', 'Alex Brown', 4, 'Challenging but rewarding course');
INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('Literature Analysis', 'Emily Davis', 3, 'Enjoyed the discussions but assignments were tough');
INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('Music Theory', 'Chris Evans', 5, 'Best course Ive taken so far, would recommend to anyone');
INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('Foreign Languages', 'Sophia King', 4, 'Improved my language skills significantly');
INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('Psychology Basics', 'Ryan Parker', 4, 'Fascinating subject, great professor');
INSERT INTO course_feedback (course_name, learner_name, rating, feedback) VALUES ('Business Management', 'Liam Wilson', 4, 'Practical knowledge for future career');
