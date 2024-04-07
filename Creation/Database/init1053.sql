CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id INT(6) UNSIGNED,
    rating DECIMAL(2,1) NOT NULL,
    review TEXT,
    submit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO courses (name, description) VALUES ('Mathematics 101', 'Basic math concepts for beginners');
INSERT INTO courses (name, description) VALUES ('Programming Fundamentals', 'Introduction to programming logic');
INSERT INTO courses (name, description) VALUES ('History of Ancient Civilizations', 'Exploring ancient cultures and societies');
INSERT INTO courses (name, description) VALUES ('Literature Appreciation', 'Analysis of classic literary works');
INSERT INTO courses (name, description) VALUES ('Chemistry Lab Techniques', 'Hands-on experiments in chemistry');
INSERT INTO courses (name, description) VALUES ('Digital Marketing Strategies', 'Effective marketing techniques in the digital age');
INSERT INTO courses (name, description) VALUES ('Psychology 101', 'Introduction to basic psychological theories');
INSERT INTO courses (name, description) VALUES ('Art History Survey', 'Survey of different art movements throughout history');
INSERT INTO courses (name, description) VALUES ('Environmental Science Studies', 'Understanding environmental issues and solutions');
INSERT INTO courses (name, description) VALUES ('Introduction to Economics', 'Basic concepts in economic theory');

INSERT INTO ratings (course_id, rating, review) VALUES (1, 4.5, 'Great course, very informative');
INSERT INTO ratings (course_id, rating, review) VALUES (2, 3.8, 'A good introduction to programming');
INSERT INTO ratings (course_id, rating, review) VALUES (5, 4.2, 'Interesting experiments and concepts taught');
INSERT INTO ratings (course_id, rating, review) VALUES (3, 4.7, 'Fascinating insight into ancient civilizations');
INSERT INTO ratings (course_id, rating, review) VALUES (7, 4.0, 'Enjoyed learning about psychological theories');
INSERT INTO ratings (course_id, rating, review) VALUES (6, 4.5, 'Useful strategies for digital marketing');
INSERT INTO ratings (course_id, rating, review) VALUES (8, 3.5, 'Informative survey of art history');
INSERT INTO ratings (course_id, rating, review) VALUES (4, 4.8, 'Loved analyzing classic literature');
INSERT INTO ratings (course_id, rating, review) VALUES (10, 4.3, 'Interesting introduction to economic concepts');
INSERT INTO ratings (course_id, rating, review) VALUES (9, 4.1, 'Eye-opening environmental science studies');
