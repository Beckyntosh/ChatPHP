CREATE TABLE IF NOT EXISTS LearningPaths (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    user_id INT(6) UNSIGNED,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert some example values into the LearningPaths table
INSERT INTO LearningPaths (course_name, user_id) VALUES ('Introduction to Data Science', 1);
INSERT INTO LearningPaths (course_name, user_id) VALUES ('Data Analysis with Python', 1);
INSERT INTO LearningPaths (course_name, user_id) VALUES ('Machine Learning Fundamentals', 1);
INSERT INTO LearningPaths (course_name, user_id) VALUES ('Deep Learning Basics', 1);
INSERT INTO LearningPaths (course_name, user_id) VALUES ('Statistics for Data Science', 1);
INSERT INTO LearningPaths (course_name, user_id) VALUES ('SQL for Data Science', 1);
INSERT INTO LearningPaths (course_name, user_id) VALUES ('Data Visualization', 1);
INSERT INTO LearningPaths (course_name, user_id) VALUES ('Big Data Technologies', 1);
INSERT INTO LearningPaths (course_name, user_id) VALUES ('Natural Language Processing', 1);
INSERT INTO LearningPaths (course_name, user_id) VALUES ('Computer Vision', 1);
