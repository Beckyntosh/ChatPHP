CREATE TABLE IF NOT EXISTS feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(50) NOT NULL,
    effectiveness_rating TINYINT NOT NULL,
    comments TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('Introduction to Programming', 5, 'Great course, very informative');
INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('Machine Learning Basics', 4, 'Good content, could use more examples');
INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('Web Development Fundamentals', 3, 'Decent course, some topics were unclear');
INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('Data Science Techniques', 5, 'Excellent course, highly recommended');
INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('iOS App Development', 4, 'Enjoyed the course, practical projects');
INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('Graphic Design Essentials', 4, 'Valuable information, engaging assignments');
INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('Business Analytics Fundamentals', 3, 'Average course, lacked in-depth explanation');
INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('Digital Marketing Strategies', 5, 'Top-notch content, very relevant to current trends');
INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('Photography Masterclass', 4, 'Informative course, improved my skills');
INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('Finance for Non-Financial Managers', 3, 'Useful course, but drags in some parts');
